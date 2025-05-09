<?php
use App\Core\FileStore;
use Illuminate\Http\UploadedFile;

if(!function_exists('storeFile')){
    function storeFile(UploadedFile $file, $folder= 'avatar'): string {
        $fileStores = new FileStore();
        $path = $fileStores->storeFile($file,$folder);
        return $path;
    }
}

