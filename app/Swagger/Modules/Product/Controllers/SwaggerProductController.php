<?php
namespace App\Swagger\Modules\Product\Controllers;

use App\Swagger\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwaggerProductController extends SwaggerController {
/**
* @OA\Get(
*      path="/api/V1/products",
*      operationId="products-list",
*      tags={"Product"},
*      summary="Get list of products",
*      description="Returns list of products",
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
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductResource")
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
*      path="/api/V1/products",
*      operationId="products-create",
*     tags={"Product"},
*      summary="Store new products",
*      description="Returns the created object of products",
*      security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProduct")
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
*      path="/api/V1/products//{id}",
*      operationId="products-details",
*      tags={"Product"},
*      summary="Get products information",
*      description="Returns products data",
*         security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="products id",
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProduct")
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
*      path="/api/V1/products//{id}",
*      operationId="products-update",
*      tags={"Product"},
*      summary="Update existing products",
*      description="Returns updated products data",
*         security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductUpdateRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProduct")
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
*      path="/api/V1/products//{id}",
*      operationId="products-delete",
*      tags={"Product"},
*      summary="Delete existing products",
*      description="Deletes a record and returns no content",
*      security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="products id",
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
