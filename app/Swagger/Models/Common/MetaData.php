<?php


namespace App\Swagger\Models\Common;

/**
 * @OA\Schema(
 *     title="Metadata",
 *     description="Metadata model",
 *     @OA\Xml(
 *         name="Metadata"
 *     )
 * )
 */
class MetaData
{
    /**
     * @OA\Property(
     *     title="Pagination",
     *     description="Pagination wrapper"
     * )
     *
     * @var \App\Swagger\Models\Common\Pagination[]
     */
    private $pagination;
}
