<?php
namespace App\Swagger\Modules\Client\Requests;
/**
 * @OA\Schema(
 *      title="Update Cart  request",
 *      description="Update  Cart  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerCartUpdateRequest
{
  /**
  * @OA\Property(
  *     title="id",
  *     description="id",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $id;
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

}
