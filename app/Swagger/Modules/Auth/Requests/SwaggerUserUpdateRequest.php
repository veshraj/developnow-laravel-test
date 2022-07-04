<?php

namespace App\Swagger\Modules\Auth\Requests;

/**
 * @OA\Schema(
 *      title="Update User  request",
 *      description="Update  User  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerUserUpdateRequest
{
    /**
     * @OA\Property(
     *      title="id",
     *      description="Id of User",
     *      example=1
     * )
     *
     * @var  string
     */
    public $id;
    
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
