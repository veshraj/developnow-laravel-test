<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\Response;

trait ResponseHelper
{
    private $headers = [
        "Content-Disposition" => "attachment; filename=",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0",
    ];
    
    /**
     * @param        $data
     * @param  string  $message
     */
    function responseOk($data, $message = '')
    {
        $responseFormat = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Operation Successful',
            'payload'      => $data,
        
        ];
        if (config('app.debug') == true) {
            $responseFormat['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseFormat, Response::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param        $data
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function responseCreated($data, $message = 'null')
    {
        $responseData = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Data created Successfully',
            'payload'      => $data,
        ];
        if (config('app.debug') == true) {
            $responseData['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseData, Response::HTTP_CREATED, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param        $data
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function responseUpdated($data, $message = '')
    {
        $responseData = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Data modified successfully',
            'payload'      => $data,
        ];
        if (config('app.debug') == true) {
            $responseData['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseData, Response::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function responseSoftDeleted($deleted = true, $message = '')
    {
        $responseData = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Deleted successfully',
        ];
        if (config('app.debug') == true) {
            $responseData['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseData, Response::HTTP_ACCEPTED, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function responseDeleted($deleted = true, $message = '')
    {
        $responseData = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Deleted successfully',
        ];
        if (config('app.debug') == true) {
            $responseData['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseData, Response::HTTP_ACCEPTED, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param  int  $total
     * @param        $data
     * @param  string  $message
     *
     * @return JsonResponse
     */
    function responsePaginate($models, $message = '')
    {
        $responseData = [
            'status'       => 'ok',
            'message_code' => $message ?: 'Data loaded successfully',
            'payload'      => $models->items(),
            'meta_data'    => [
                "pagination" => [
                    'total'        => $models->total(),
                    'per_page'     => $models->perPage(),
                    'last_page'    => $models->lastPage(),
                    'current_page' => $models->currentPage(),
                    'from'         => $models->firstItem(),
                    'to'           => $models->lastItem(),
                ],
            ],
        ];
        if (config('app.debug') == true) {
            $responseData['debug'] = app('debugbar')->getData();
        }
        
        return response()->json($responseData, Response::HTTP_OK, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param  int  $code
     * @param  string  $message
     * @return JsonResponse
     */
    function responseError($code = 500, $message = '')
    {
        $responseData = [
            'status'       => 'error',
            'code'         => $code,
            'message_code' => $message ?: 'There was some error.',
        ];
        
        return response()->json($responseData, $code, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * @param $callBack
     * @param $headers
     * @return StreamedResponse
     */
    function responseStream($callBack, $headers)
    {
        return response()->streamDownload($callBack, request()->input('file_name'), $headers);
    }
    
    
    public function csvHeaders()
    {
        $this->headers['Content-type']        = 'text/csv';
        $this->headers['Content-Disposition'] = $this->headers['Content-Disposition'].request()->input('file_name');
        
        
        return $this->headers;
    }
    
    public function responseOkWithNoMessage($data)
    {
        return response()->json([], Response::HTTP_NO_CONTENT, [], JSON_PRETTY_PRINT);
    }
}
