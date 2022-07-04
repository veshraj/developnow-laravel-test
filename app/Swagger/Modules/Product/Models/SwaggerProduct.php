<?php

namespace App\Swagger\Modules\Product\Models;

use App\Swagger\Models\Common\BaseModel;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class SwaggerProduct extends BaseModel
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="name",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $name;
    /**
     * @OA\Property(
     *     title="price",
     *     description="price",
     *     format="string",
     *     example=""
     * )
     *
     * @var    string
     */
    private $price;
    /**
     * @OA\Property(
     *     title="category_id",
     *     description="category_id",
     *     format="string",
     *     example=1
     * )
     *
     * @var    integer
     */
    private $category_id;
    
    /**
     * @OA\Property(
     *     title="image",
     *     description="image",
     *     format="string",
     *     example="image_url"
     * )
     *
     * @var   string
     */
    private $image;
    
    /**
     * @OA\Property(
     *     title="inventory_stock",
     *     description="inventory_stock",
     *     format="string",
     *     example=1
     * )
     *
     * @var   integer
     */
    private $inventory_stock;
    
    /**
     * @OA\Property(
     *     title="category",
     *     description="category",
     *     format="string",
     *     example=1
     * )
     *
     * @var    \App\Swagger\Modules\Product\Models\SwaggerProductCategory
     */
    private $category;
}


