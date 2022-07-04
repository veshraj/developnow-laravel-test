<?php

namespace App\Swagger\Modules\Client\Controllers;

use App\Swagger\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwaggerClientController extends SwaggerController
{
    /**
     * @OA\Get(
     *      path="/api/v1/clients",
     *      operationId="clients-list",
     *      tags={"Client"},
     *      summary="Get list of clients",
     *      description="Returns list of clients",
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
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerClientResource")
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
     *      path="/api/v1/clients",
     *      operationId="clients-create",
     *     tags={"Client"},
     *      summary="Store new clients",
     *      description="Returns the created object of clients",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerClientRequest")
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
     *                  @OA\Items(ref="#/components/schemas/SwaggerClient")
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
     *      path="/api/v1/clients/{id}",
     *      operationId="clients-details",
     *      tags={"Client"},
     *      summary="Get clients information",
     *      description="Returns clients data",
     *         security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="clients id",
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
     *                  @OA\Items(ref="#/components/schemas/SwaggerClient")
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
    public function show()
    {
    }
    
    
    /**
     * @OA\Put(
     *      path="/api/v1/clients/{id}",
     *      operationId="clients-update",
     *      tags={"Client"},
     *      summary="Update existing clients",
     *      description="Returns updated clients data",
     *         security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SwaggerClientUpdateRequest")
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
     *                  @OA\Items(ref="#/components/schemas/SwaggerClient")
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
     *      path="/api/v1/clients/{id}",
     *      operationId="clients-delete",
     *      tags={"Client"},
     *      summary="Delete existing clients",
     *      description="Deletes a record and returns no content",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="clients id",
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
    public function destroy()
    {
    }
    
}
