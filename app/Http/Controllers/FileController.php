<?php

namespace App\Http\Controllers\API\V1;

use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Interfaces\FileRepositoryInterface;
use App\Http\Requests\FileRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class FileController extends Controller
{
    
    
    public function uploadSingleFile(FileRequest $request)
    {
        $storagePath = storage_path('files');
        if (!(file_exists($storagePath) && is_dir($storagePath))) {
            mkdir($storagePath, 0777);
        }
        
        if (Arr::has($request, 'file') && $request['file'] instanceof UploadedFile) {
            $file            = $request['file'];
            $fileName        = $file->store('files', ['disk' => 'public']);
            $data['fileUrl'] = asset('storage/'.$fileName);
            
            return $this->responseCreated($data, "Item Created");
        }
        throw new CustomException("Service Unavailable due to unknown reason", Response::HTTP_SERVICE_UNAVAILABLE);
    }
    
}
