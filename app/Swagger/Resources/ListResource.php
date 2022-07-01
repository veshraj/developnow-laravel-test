<?php

namespace App\Swagger\Resources;

/**
 * @OA\Schema(
 *     title="List",
 *     description="ListResource model, list without pagination",
 *     @OA\Xml(
 *         name="ListResource"
 *     )
 * )
 */
class ListResource
{
    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     format="string",
     *     example="ok"
     * )
     *
     * @var string
     */
    protected $status;

    /**
     * @OA\Property(
     *     title="message",
     *     description="message",
     *     format="string",
     *     example="Items listed successfully"
     * )
     *
     * @var string
     */
    protected $message;
}
