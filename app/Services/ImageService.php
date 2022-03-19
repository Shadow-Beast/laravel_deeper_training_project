<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Save Image
     *
     * @param Request $request
     * @param [Meeting] $object
     * @return void
     */
    public function save(Request $request, $object)
    {
        $imageFile = $request->file('image');
        if (isset($imageFile)) {
            [$storagePath, $dir] = $this->makeDirectory($object);
            
            // Remove Image if exist
            if($object->image) {
                Storage::delete($object->image->path);
            }

            $path = Storage::putFile($dir, $imageFile);
            $name = basename($path);

            $imageParam = [
                'name' => $name,
                'path' => $path,
                'url' => Storage::url($path),
            ];

            $image = Image::firstOrNew(
                [
                    'imageable_id' => $request->id,
                ],
                $imageParam
            );
            if ($image->id) {
                $image->fill($imageParam);
            }

            $object->image()->save($image);
        }
    }

    /**
     * Make Directory for Image
     *
     * @param [type] $object
     * @return array
     */
    protected function makeDirectory($object):array {
        $disk = env('FILESYSTEM_DRIVER');

        $storagePath = config('filesystems.disks.' . $disk . '.root');

        $tableName = $object->getTable();
        $dir = 'images/' . $tableName;        
        Storage::makeDirectory($dir);

        return [$storagePath, $dir];
    }
}
