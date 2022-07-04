<?php
namespace App\Swagger\Modules\Auth\Models;

use App\Swagger\Models\Common\BaseModel;
/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */

class SwaggerUser extends BaseModel
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example="John"
     * )
     *
     * @var  string
     */
    private $name;
    
    /**
     * @OA\Property(
     *     title="email",
     *     description="Email",
     *     format="email",
     *     example="johndoe@gmail.com"
     * )
     *
     * @var  string
     */
    
    private $email;
}


