<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CustomException extends Exception
{
    /**
     * CustomException constructor.
     * @param  string  $message
     * @param  int  $code
     */
    public function __construct(string $message = 'Internal Server Error', $code = 500)
    {
        parent::__construct($message, $code);
    }

    /**
     * Log the error in log file
     */
    public function report()
    {
        Log::error($this->message);
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function render($request)
    {
//		if ($request->ajax) {
        return response()->json([
            'status'  => 'Error',
            'code'    => $this->getCode() ?: 500,
            'message' => $this->getMessage(),
        ], $this->getCode() ?: 500, [], JSON_PRETTY_PRINT);
//		}
    }
}
