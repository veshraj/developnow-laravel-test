<?php

namespace Modules\Product\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Repositories\Contracts\ProductCategoryRepositoryInterface;
use Modules\Product\Models\ProductCategory;
use Modules\Product\Repositories\Resources\ProductCategoryResource;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    
    protected ProductCategory $model;
    
    public function model()
    : ProductCategory
    {
        return new ProductCategory();
    }
    
    public function resource(Model $category)
    : JsonResource {
        return new ProductCategoryResource($category);
    }
}
