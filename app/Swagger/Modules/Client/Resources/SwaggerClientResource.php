<?php
namespace App\Swagger\Modules\Client\Resources;

use App\Swagger\Resources\PaginatedResource;

/**
* @OA\Schema(
*     title="ClientResource",
*     description="Client resource",
*     @OA\Xml(
*         name="SwaggerClientResource"
*     )
* )
*/
class SwaggerClientResource extends PaginatedResource
{
    /**
    * @OA\Property(
    *     title="Payload",
    *     description="Payload wrapper"
    * )
    *
    * @var  \App\Swagger\Modules\Client\Models\SwaggerClient[]
    */
    private $payload;
}

