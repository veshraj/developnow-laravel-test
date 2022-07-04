<?php
namespace App\Swagger\Modules\Client\Requests;
/**
 * @OA\Schema(
 *      title=" Client  request",
 *      description="  Client  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerClientRequest
{
  /**
  * @OA\Property(
  *     title="id",
  *     description="id",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
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
