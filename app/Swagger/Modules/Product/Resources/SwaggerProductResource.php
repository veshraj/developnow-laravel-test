<?php
namespace App\Swagger\Modules\Product\Resources;

use App\Swagger\Resources\PaginatedResource;

/**
* @OA\Schema(
*     title="ProductResource",
*     description="Product resource",
*     @OA\Xml(
*         name="SwaggerProductResource"
*     )
* )
*/
class SwaggerProductResource extends PaginatedResource
{
    /**
    * @OA\Property(
    *     title="Payload",
    *     description="Payload wrapper"
    * )
    *
    * @var  \App\Swagger\Modules\Product\Models\SwaggerProduct[]
    */
    private $payload;
}

