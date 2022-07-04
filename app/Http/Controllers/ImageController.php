<?php

namespace App\Http\Controllers\API\V1;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageMultipleCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Http\Requests\ImageCreateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

/**
 * Class ImageController
 * @package App\Http\Controllers\API\V1
 */
class ImageController extends Controller
{
    
    /**
     * @param  ImageCreateRequest  $request
     *
     * @return JsonResponse
     */
    public function uploadSingleImage(ImageCreateRequest $request)
    {
        $storagePath = storage_path('images');
        if (!(file_exists($storagePath) && is_dir($storagePath))) {
            mkdir($storagePath, 0777);
        }
        
        if (Arr::has($request, 'image') && $request['image'] instanceof UploadedFile) {
            $file             = $request['image'];
            $fileName         = $file->store('images', ['disk' => 'public']);
            $data['imageUrl'] = asset('storage/'.$fileName);
            
            return $this->responseCreated($data, "Item Created");
        }
        throw new CustomException("Service Unavailable due to unknown reason", Response::HTTP_SERVICE_UNAVAILABLE);
    }
}
