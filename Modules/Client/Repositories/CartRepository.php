<?php

namespace Modules\Client\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Client\Repositories\Contracts\CartRepositoryInterface;
use Modules\Client\Models\Cart;
use Modules\Client\Repositories\Resources\CartResource;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    
    protected Cart $model;
    
    public function model()
    : Cart
    {
        return new Cart();
    }
    
    public function resource(Model $instance)
    : JsonResource {
        return new CartResource($instance);
    }
}
