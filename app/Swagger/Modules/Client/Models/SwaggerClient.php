<?php

namespace App\Swagger\Modules\Client\Models;

use App\Swagger\Models\Common\BaseModel;
use DateTime;

/**
 * @OA\Schema(
 *     title="Client",
 *     description="Client model",
 *     @OA\Xml(
 *         name="Client"
 *     )
 * )
 */
class SwaggerClient extends BaseModel
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
    /**
     * @OA\Property(
     *     title="verified_at",
     *     description="verified_at",
     *     format="string",
     *     example=""
     * )
     *
     * @var    DateTime
     */
    private $verified_at;
}


