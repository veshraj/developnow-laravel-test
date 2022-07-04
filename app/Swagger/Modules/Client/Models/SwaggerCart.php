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
     *     title="product",
     *     description="product associated with cart item",
     *     format="string",
     *     example=""
     * )
     *
     * @var    \App\Swagger\Modules\Product\Models\SwaggerProduct
     */
    private $product;
    
    /**
     * @OA\Property(
     *     title="client",
     *     description="client associated with cart item",
     *     format="string",
     *     example=""
     * )
     *
     * @var    \App\Swagger\Modules\Client\Models\SwaggerClient
     */
    private $client;
    
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
     *     example=10
     * )
     *
     * @var    int
     */
    private $price;
    
    /**
     * @OA\Property(
     *     title="line_item_amount",
     *     description="line_item_amount",
     *     format="string",
     *     example=10
     * )
     *
     * @var  integer
     */
    private $line_item_amount;
    
}


