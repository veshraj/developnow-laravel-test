<?php
namespace App\Swagger\Modules\Product\Requests;
/**
 * @OA\Schema(
 *      title=" ProductCategory  request",
 *      description="  ProductCategory  request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SwaggerProductCategoryRequest
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

}
