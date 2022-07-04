<?php

namespace App\Swagger\Modules\Client\Requests;

/**
 * @OA\Schema(
 *      title=" Cart  request",
 *      description="  Cart  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerCartRequest
{
    /**
     * @OA\Property(
     *     title="product_id",
     *     description="product_id",
     *     format="string",
     *     example=""
     * )
     *
     * @var    int
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
     * @var    integer
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
    
}
