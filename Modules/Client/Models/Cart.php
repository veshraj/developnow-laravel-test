<?php

namespace Modules\Client\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\DBTables;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = DBTables::CARTS;
    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = ['product_id', 'client_id', 'quantity', 'price'];
    
    protected $hidden = ['created_at', 'updated_at',];
    
    public function product()
    : BelongsTo
    {
        return $this->belongsTo('Modules\Product\Models\Product', 'product_id', 'id');
    }
    
    public function client()
    : BelongsTo
    {
        return $this->belongsTo('Modules\Client\Models\Client', 'client_id', 'id');
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
