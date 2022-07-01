<?php
/**
 * Created by Umesh Sujakhu
 * Date: 1/25/22
 * Time: 4:13 PM
 */

namespace Modules\Auth\Swagger\Requests;

/**
 * @OA\Schema(
 *      title="Login",
 *      description="Login body data",
 *      type="object",
 *      required={"email", "password"}
 * )
 */
class SwaggerLoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="johndoe@gmail.com"
     * )
     *
     * @var  string
     */
    public string $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Passwrod of the user",
     *      example="password"
     * )
     *
     * @var  string
     */
    public string $password;

}
