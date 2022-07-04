<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = DBTables::PRODUCTS;
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['name', 'price', 'category_id', 'image', 'inventory_stock',];
    
    protected $hidden = ['created_at', 'updated_at',];
    
    
    public function productCategory()
    : BelongsTo
    {
        return $this->belongsTo('Modules\Product\Models\ProductCategory', 'category_id', 'id');
    }
    
    protected function price()
    : Attribute
    {
        return Attribute::make(
            get: fn($value) => $value / 100,
            set: fn($value) => $value * 100,
        );
    }
    
}
