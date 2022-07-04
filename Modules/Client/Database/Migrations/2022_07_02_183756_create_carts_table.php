<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create(DBTables::CARTS, function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('client_id');
            $table->integer('quantity')->defualt(1);
            $table->integer('price');
            $table->foreign('product_id')->references('id')->on(DBTables::PRODUCTS);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists(DBTables::CARTS);
    }
}
