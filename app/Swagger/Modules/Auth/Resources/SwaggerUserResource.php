<?php
namespace App\Swagger\Modules\Auth\Resources;

use App\Swagger\Resources\PaginatedResource;

/**
* @OA\Schema(
*     title="UserResource",
*     description="User resource",
*     @OA\Xml(
*         name="SwaggerUserResource"
*     )
* )
*/
class SwaggerUserResource extends PaginatedResource
{
    /**
    * @OA\Property(
    *     title="Payload",
    *     description="Payload wrapper"
    * )
    *
    * @var  \App\Swagger\Modules\Auth\Models\SwaggerUser[]
    */
    private $payload;
}

