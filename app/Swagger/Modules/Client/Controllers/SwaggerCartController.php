<?php
namespace App\Swagger\Modules\Client\Controllers;

use App\Swagger\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwaggerCartController extends SwaggerController {
/**
* @OA\Get(
*      path="/api/V1/carts",
*      operationId="carts-list",
*      tags={"Cart"},
*      summary="Get list of carts",
*      description="Returns list of carts",
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
*          @OA\JsonContent(ref="#/components/schemas/SwaggerCartResource")
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
public function index(){}

/**
* @OA\Post(
*      path="/api/V1/carts",
*      operationId="carts-create",
*     tags={"Cart"},
*      summary="Store new carts",
*      description="Returns the created object of carts",
*      security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerCartRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerCart")
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
public function store(){}

/**
* @OA\Get(
*      path="/api/V1/carts//{id}",
*      operationId="carts-details",
*      tags={"Cart"},
*      summary="Get carts information",
*      description="Returns carts data",
*         security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="carts id",
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
*                  @OA\Items(ref="#/components/schemas/SwaggerCart")
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
public function show(){}


/**
* @OA\Put(
*      path="/api/V1/carts//{id}",
*      operationId="carts-update",
*      tags={"Cart"},
*      summary="Update existing carts",
*      description="Returns updated carts data",
*         security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerCartUpdateRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerCart")
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
public function update(){}


/**
* @OA\Delete(
*      path="/api/V1/carts//{id}",
*      operationId="carts-delete",
*      tags={"Cart"},
*      summary="Delete existing carts",
*      description="Deletes a record and returns no content",
*      security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="carts id",
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
public function destroy(){}

}
