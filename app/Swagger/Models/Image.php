<?php

namespace App\Swagger\Models;

use App\Swagger\Models\Common\BaseModel;

/**
 * @OA\Schema(
 *     title="Images",
 *     description="Images model",
 *     @OA\Xml(
 *         name="Images"
 *     )
 * )
 */
class Image
{
    /**
     * @OA\Property(
     *      title="imageUrl",
     *      description="imageUrl",
     *      example="http://xyz.com/abc.jpg"
     * )
     *
     * @var string
     */
    public $imageUrl;

}
