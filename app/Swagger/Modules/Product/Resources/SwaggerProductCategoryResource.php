<?php
namespace App\Swagger\Modules\Product\Resources;

use App\Swagger\Resources\PaginatedResource;

/**
* @OA\Schema(
*     title="ProductCategoryResource",
*     description="ProductCategory resource",
*     @OA\Xml(
*         name="SwaggerProductCategoryResource"
*     )
* )
*/
class SwaggerProductCategoryResource extends PaginatedResource
{
    /**
    * @OA\Property(
    *     title="Payload",
    *     description="Payload wrapper"
    * )
    *
    * @var  \App\Swagger\Modules\Product\Models\SwaggerProductCategory[]
    */
    private $payload;
}

