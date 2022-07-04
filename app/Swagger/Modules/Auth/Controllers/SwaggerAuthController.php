<?php

namespace App\Swagger\Modules\Auth\Controllers;

use App\Swagger\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwaggerAuthController extends SwaggerController
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
    public function login(){}
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
    public  function me(){}
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
    public function logout(){}
}
