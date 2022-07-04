<?php
namespace App\Swagger\Modules\Client\Resources;

use App\Swagger\Resources\PaginatedResource;

/**
* @OA\Schema(
*     title="CartResource",
*     description="Cart resource",
*     @OA\Xml(
*         name="SwaggerCartResource"
*     )
* )
*/
class SwaggerCartResource extends PaginatedResource
{
    /**
    * @OA\Property(
    *     title="Payload",
    *     description="Payload wrapper"
    * )
    *
    * @var  \App\Swagger\Modules\Client\Models\SwaggerCart[]
    */
    private $payload;
}

