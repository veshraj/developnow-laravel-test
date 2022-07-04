<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = DBTables::PRODUCT_CATEGORIES;
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['name',];
    
    protected $hidden = ['created_at', 'updated_at',];
    
}
