<?php


namespace App\Swagger\Models\Common;

use DateTime;

/**
 * @OA\Schema(
 *     title="Base History",
 *     description="Base History model",
 *     @OA\Xml(
 *         name="Base History"
 *     )
 * )
 */
class BaseHistory
{
    /**
     * @OA\Property(
     *      title="message",
     *      description="Message of the history item",
     *      example="Property has been changed from state1 to state2"
     * )
     *
     * @var  string
     */
    public $message;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var  DateTime
     */
    public $created_at;
}