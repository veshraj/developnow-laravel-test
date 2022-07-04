<?php

namespace App\Swagger\Modules\Client\Models;

use App\Swagger\Models\Common\BaseModel;

/**
 * @OA\Schema(
 *     title="Cart",
 *     description="Cart model",
 *     @OA\Xml(
 *         name="Cart"
 *     )
 * )
 */
class SwaggerCart extends BaseModel
{
    /**
     * @OA\Property(
     *     title="product_id",
     *     description="product_id",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $product_id;
    
    /**
     * @OA\Property(
     *     title="client_id",
     *     description="client_id",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $client_id;
    
    /**
     * @OA\Property(
     *     title="quantity",
     *     description="quantity",
     *     format="integer",
     *     example=1
     * )
     *
     * @var    int
     */
    private $quantity;
    
    /**
     * @OA\Property(
     *     title="price",
     *     description="price",
     *     format="integer",
     *     example=1
     * )
     *
     * @var    int
     */
    private $price;
    
    /**
     * @OA\Property(
     *     title="product_id",
     *     description="product_id",
     *     format="string",
     *     example=""
     * )
     *
     * @var  \App\Swagger\Modules\Product\Models\SwaggerProduct
     */
    private $product;
    
    /**
     * @OA\Property(
     *     title="client_id",
     *     description="client_id",
     *     format="string",
     *     example=""
     * )
     *
     * @var \App\Swagger\Modules\Client\Models\SwaggerClient
     */
    private $client;
}


