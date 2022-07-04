<?php
namespace App\Swagger\Modules\Product\Requests;
/**
 * @OA\Schema(
 *      title="Update ProductCategory  request",
 *      description="Update  ProductCategory  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerProductCategoryUpdateRequest
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
  *     title="name",
  *     description="name",
  *     format="string",
  *     example=""
  * )
  *
  * @var    string
  */
  private $name;

}
