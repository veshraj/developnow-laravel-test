<?php
namespace Modules\Auth\Swagger\Models;

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
  *     title="designation",
  *     description="designation",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $designation;
   }


