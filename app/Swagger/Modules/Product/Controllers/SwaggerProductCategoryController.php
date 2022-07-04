<?php
namespace App\Swagger\Modules\Product\Controllers;

use App\Swagger\Controllers\SwaggerController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SwaggerProductCategoryController extends SwaggerController {
/**
* @OA\Get(
*      path="/api/V1/product-categories",
*      operationId="product_categories-list",
*      tags={"ProductCategory"},
*      summary="Get list of product_categories",
*      description="Returns list of product_categories",
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
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductCategoryResource")
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
public  function index(){}

/**
* @OA\Post(
*      path="/api/v1/product-categories",
*      operationId="product_categories-create",
*     tags={"ProductCategory"},
*      summary="Store new product_categories",
*      description="Returns the created object of product_categories",
*      security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductCategoryRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProductCategory")
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
*      path="/apiV1/product-categories//{id}",
*      operationId="product_categories-details",
*      tags={"ProductCategory"},
*      summary="Get product_categories information",
*      description="Returns product_categories data",
*         security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="product_categories id",
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProductCategory")
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
public function show() {}

/**
* @OA\Put(
*      path="/api/v1/product-categories/{id}",
*      operationId="product_categories-update",
*      tags={"ProductCategory"},
*      summary="Update existing product_categories",
*      description="Returns updated product_categories data",
*         security={{"bearer_token":{}}},
*      @OA\RequestBody(
*          required=true,
*          @OA\JsonContent(ref="#/components/schemas/SwaggerProductCategoryUpdateRequest")
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
*                  @OA\Items(ref="#/components/schemas/SwaggerProductCategory")
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
*      path="/api/v1/product-categories/{id}",
*      operationId="product_categories-delete",
*      tags={"ProductCategory"},
*      summary="Delete existing product_categories",
*      description="Deletes a record and returns no content",
*      security={{"bearer_token":{}}},
*      @OA\Parameter(
*          name="id",
*          description="product_categories id",
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
