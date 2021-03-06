<?php

namespace App\Swagger\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Developnow Test-Api Swagger Documentation",
 *      description="Developnow Api Swagger documentation description",
 *      @OA\Contact(
 *          email="veshraj.joshi1@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Developnow Test API Server"
 * )
 *
 * @OA\Schemes(format="http")
 * @OAS\SecurityScheme(
 *      securityScheme="bearer_token",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class SwaggerController
{
    
}
