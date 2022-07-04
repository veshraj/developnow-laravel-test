<?php

namespace App\Swagger\Modules\Client\Requests;

/**
 * @OA\Schema(
 *      title="Update Client  request",
 *      description="Update  Client  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerClientUpdateRequest
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     format="string",
     *     example=""
     * )
     *
     * @var    integer
     */
    private $id;
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
    /**
     * @OA\Property(
     *     title="mobile",
     *     description="mobile",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $mobile;
    
}
