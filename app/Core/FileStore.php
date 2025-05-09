<?php

namespace App\Core;
use App\Traits\FileHandler;
use Illuminate\Http\UploadedFile;

class FileStore {
    use FileHandler;

    public function saveFile(UploadedFile $file, string $folder = 'avatar'): string{
        $path = $this->storeFile($file,$folder);

        return $path;
    }
}