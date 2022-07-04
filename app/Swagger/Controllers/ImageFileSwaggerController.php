<?php

namespace App\Swagger\Controllers;

use App\Swagger\Controllers\SwaggerController;

class ImageFileSwaggerController extends SwaggerController
{
    /**
     * @OA\Post(
     *      path="/api/files",
     *      operationId="api/v1/files-create",
     *      tags={"File Uploads"},
     *      summary="Store new Files",
     *      description="Returns project Files",
     *      security={{"bearer_token":{}}},
     *       @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="File to upload",
     *                     property="file",
     *                     type="string",
     *                     format="binary",
     *                 ),
     *             ),
     *         ),
     *     ),
     *
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
     *                  type="object",
     *                  ref="#/components/schemas/Image"
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
    public function uploadFile()
    {
    }
    
    /**
     * @OA\Post(
     *      path="/api/v1/images",
     *      operationId="api/v1/images-create",
     *      tags={"Image Upload"},
     *      summary="Store new Images",
     *      description="Returns Image Url",
     *      security={{"bearer_token":{}}},
     *       @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="Image to upload",
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                 ),
     *             ),
     *         ),
     *     ),
     *
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
     *                  type="object",
     *                  ref="#/components/schemas/Image"
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
    public function uploadImage()
    {
    }
    
}