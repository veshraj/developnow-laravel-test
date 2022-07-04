<?php

namespace Modules\Product\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Mockery\Generator\StringManipulation\Pass\ClassPass;
use Modules\Product\Http\Repositories\Resources\ProductCategoryCollectionResource;
use Modules\Product\Models\ProductCategory;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\Resources\ProductCategoryResource;
use Modules\Product\Repositories\Resources\ProductResource;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    
    protected Product $model;
    
    public function model()
    : Product
    {
        return new Product();
    }
    
    public function resource(Model $instance)
    : JsonResource {
        return new ProductResource($instance);
    }
}
