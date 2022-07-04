<?php

namespace App\Swagger\Modules\Product\Models;

use App\Swagger\Models\Common\BaseModel;

/**
 * @OA\Schema(
 *     title="ProductCategory",
 *     description="ProductCategory model",
 *     @OA\Xml(
 *         name="ProductCategory"
 *     )
 * )
 */
class SwaggerProductCategory extends BaseModel
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


