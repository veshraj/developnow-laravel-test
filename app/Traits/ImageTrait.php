<?php
/**
 * Created by Umesh Sujakhu
 * Date: 2/7/22
 * Time: 3:32 PM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

trait ImageTrait
{

    /**
     * @param Request $request
     * @param $key
     *
     * @return string|null
     */
    public function uploadSingleImage(Request $request, $key): ?string
    {
        $storagePath = storage_path('images');
        if (!(file_exists($storagePath) && is_dir($storagePath))) {
            mkdir($storagePath, 0777);
        }

        if (Arr::has($request, $key) && $request[$key] instanceof UploadedFile) {
            $file     = $request[$key];
            $fileName = $file->store('images', ['disk' => 'public']);
            $imageUrl = asset('storage/' . $fileName);
        }
        return $imageUrl ?? null;
    }

    /**
     * @param Request $request
     * @param $key
     *
     * @return array
     */
    public function uploadMultipleImages(Request $request, $key): array
    {
        $storagePath = storage_path('images');
        if (!(file_exists($storagePath) && is_dir($storagePath))) {
            mkdir($storagePath, 0777);
        }

        if ($request->hasfile($key)) {
            $files = $request->file($key);
            foreach ($files as $file) {
                $fileName    = $file->store('images', ['disk' => 'public']);
                $imageUrls[] = asset('storage/' . $fileName);
            }
        }
        return $imageUrls ?? [];
    }

}
