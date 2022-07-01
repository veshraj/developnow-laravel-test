<?php

namespace Modules\Auth\Swagger\Controllers;

use App\Swagger\Controllers\SwaggerController;
use OpenApi\Annotations as OA;

class SwaggerUserController extends SwaggerController
{
    /**
     * @OA\Get(
     *      path="/api/V1/users",
     *      operationId="users-list",
     *      tags={"User"},
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      security={{"bearer_token":{}}},
     *       @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Current page"
     *      ),
     *       @OA\Parameter(
     *         name="page_size",
     *         in="query",
     *         description="Page Size"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerUserResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Forbidden")
     *      )
     *     )
     */
    
    public function index()
    {
    }
    
    /**
     * @OA\Post(
     *      path="/api/V1/users/",
     *      operationId="users-create",
     *     tags={"User"},
     *      summary="Store new users",
     *      description="Returns the created object of users",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerUserRequest")
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
    public function store()
    {
    }
    
    /**
     * @OA\Get(
     *      path="/apiV1/users//{id}",
     *      operationId="users-details",
     *      tags={"User"},
     *      summary="Get users information",
     *      description="Returns users data",
     *         security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="users id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
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
    public function get()
    {
    }
    
    
    /**
     * @OA\Put(
     *      path="/apiV1/users//{id}",
     *      operationId="users-update",
     *      tags={"User"},
     *      summary="Update existing users",
     *      description="Returns updated users data",
     *         security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerUserUpdateRequest")
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
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Forbidden")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function update()
    {
    }
    
    /**
     * @OA\Delete(
     *      path="/apiV1/users//{id}",
     *      operationId="users-delete",
     *      tags={"User"},
     *      summary="Delete existing users",
     *      description="Deletes a record and returns no content",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="users id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Forbidden")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFound")
     *      )
     * )
     */
    public function destrory()
    {
    }
    
    
}
