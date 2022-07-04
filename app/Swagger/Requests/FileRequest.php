<?php

namespace App\Swagger\Requests;

/**
 * @OA\Schema(
 *      title="Create Files request",
 *      description="Create Files request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class FileRequest
{
    /**
     * @OA\Property(
     *      title="file_url",
     *      description="Id of Files",
     *      example=1
     * )
     *
     * @var  string
     */
    public $id;

}
