<?php
/**
 * Created by Umesh Sujakhu
 * Date: 1/25/22
 * Time: 4:15 PM
 */

namespace Modules\Auth\Swagger\Controllers;

use OpenApi\Annotations as OA;

class SwaggerAuthController
{
    /**
     * @OA\Post(
     *      path="/api/v1/auth/login",
     *      operationId="api/v1/login",
     *      tags={"Auth"},
     *      summary="Login User",
     *      description="Login User",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerLoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *              )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      ),
     * )
     */
    public function login()
    {
    }
    
    /**
     * @OA\Get(
     *      path="/api/v1/auth/me",
     *      operationId="api/v1/auth-me",
     *      tags={"Auth"},
     *      summary="Get Authentication Users details",
     *      description="Returns Authentication user details",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *               )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Forbidden")
     *      )
     * )
     */
    public function me()
    {
    }
    
    /**
     * @OA\Post(
     *      path="/api/v1/auth/register",
     *      operationId="api/v1/users-registration",
     *      tags={"Auth"},
     *      summary="Register new Users",
     *      description="Returns project Users",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerRegisterRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *              )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function register()
    {
    }
    
    /**
     * @OA\POST(
     *      path="/api/v1/auth/email-verification",
     *      operationId="api/v1/email-verification",
     *      tags={"Auth"},
     *      summary="Email Verificaiton of newly created user.",
     *      description="Create password for newly created user.",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerVerifyEmailRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                )
     *               )
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function emailVerification()
    {
    }
    
    /**
     * @OA\Post(
     *      path="/api/v1/auth/forgot-password",
     *      operationId="api/v1/auth-forgot-password",
     *      tags={"Auth"},
     *      summary="Submit the email to reset the password",
     *      description="Submit the email to reset the password",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerForgotPasswordRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                )
     *               )
     *       )
     *  )
     */
    public function forgotPassword()
    {
    }
    
    /**
     * @OA\POST(
     *      path="/api/v1/auth/reset-password",
     *      operationId="api/v1/auth-reset-password",
     *      tags={"Auth"},
     *      summary="Reset forgotten password",
     *      description="Reset forgotten password",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerResetPasswordRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                )
     *               )
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function resetPassword()
    {
    }
    
    /**
     * @OA\Post(
     *      path="/api/v1/auth/resend-verification-link",
     *      operationId="api/v1/resend-verification-link",
     *      tags={"Auth"},
     *      summary="Resend Verification link",
     *      description="Returns project Users",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  description="Existing email to resend verification link",
     *          )
     *        )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *              )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function resendVerificationLink()
    {
    }
    
    /**
     * @OA\Put(
     *      path="/api/v1/auth/update-profile",
     *      operationId="api/v1/update-profile",
     *      tags={"Auth"},
     *      summary="Update User Profile",
     *      description="Update User Profile",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerProfileRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *              )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      ),
     * )
     */
    public function updateProfile()
    {
    }
    
    /**
     * @OA\POST(
     *      path="/api/v1/auth/logout",
     *      operationId="api/v1/auth-logout",
     *      tags={"Auth"},
     *      summary="Logout the logged in  User",
     *      description="Logout the logged in user",
     *      security={{"bearer_token":{}}},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/SwaggerUser")
     *                )
     *               )
     *       ),
     * )
     */
    public function logout()
    {
    }
    
    /**
     * @OA\Put(
     *      path="/api/v1/auth/{id}/change-password",
     *      operationId="api/v1/auth/change-password",
     *      tags={"Auth"},
     *      summary="change Password",
     *      description="Returns project Detail",
     *      security={{"bearer_token":{}}},
     *       @OA\Parameter(
     *          name="id",
     *          description="Users id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerPasswordUpdateRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Password Changed SuccessFully"
     *                ),
     *                @OA\Property(
     *                  property="payload",
     *                  type="boolean"
     *                )
     *              )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Forbidden")
     *      )
     * )
     */
    public function changePassword()
    {
    }
    
    /**
     * @OA\POST(
     *      path="/api/v1/auth/create-password",
     *      operationId="api/v1/auth-create-password",
     *      tags={"Auth"},
     *      summary="Create password",
     *      description="Create password",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerCreatePasswordRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *                @OA\Property(
     *                  property="status",
     *                  type="string",
     *                  description="status"
     *                ),
     *                @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  description="Item Created successfully"
     *                )
     *               )
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function createPassword()
    {
    }
}
