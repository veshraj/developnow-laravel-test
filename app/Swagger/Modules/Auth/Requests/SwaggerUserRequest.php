<?php

namespace App\Swagger\Modules\Auth\Requests;

/**
 * @OA\Schema(
 *      title=" User  request",
 *      description="  User  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerUserRequest
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $name;
    
    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $email;
    
}
