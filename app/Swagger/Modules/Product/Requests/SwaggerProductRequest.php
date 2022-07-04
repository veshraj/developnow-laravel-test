<?php

namespace App\Swagger\Modules\Product\Requests;

/**
 * @OA\Schema(
 *      title=" Product  request",
 *      description="  Product  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerProductRequest
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
    
}
