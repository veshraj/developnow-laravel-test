<?php
namespace App\Swagger\Modules\Client\Models;

use App\Swagger\Models\Common\BaseModel;
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
  *     title="password",
  *     description="password",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $password;
       /**
  * @OA\Property(
  *     title="remember_token",
  *     description="remember_token",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $remember_token;
       /**
  * @OA\Property(
  *     title="verified_at",
  *     description="verified_at",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $verified_at;
   }


