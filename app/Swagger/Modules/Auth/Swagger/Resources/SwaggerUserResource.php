<?php
namespace Modules\Auth\Swagger\Resources;

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
    * @var  \Modules\Auth\Swagger\Models\SwaggerUser[]
    */
    private $payload;
}

