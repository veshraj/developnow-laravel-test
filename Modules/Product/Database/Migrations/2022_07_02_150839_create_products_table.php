<?php

use App\Constants\DBTables;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create(DBTables::PRODUCTS, function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('inventory_stock')->nullable();
            $table->foreign('category_id')->references('id')->on(DBTables::PRODUCT_CATEGORIES);
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
        Schema::dropIfExists(DBTables::PRODUCTS);
    }
}
