<?php


namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Artisan;

trait FileHandler
{
    protected $storage_prefix = 'public';
    /**
     * @param UploadedFile $file
     * @param string $folder
     * @return
     */
    public function storeFile(UploadedFile $file, $folder = 'avatar') {
        $name = Carbon::now()->format('Y_m_d_H_i_s')."_". preg_replace('/\+/', '_', $file->getClientOriginalName());
        $exist = false;

        if(file_exists("$this->storage_prefix/$folder")){
            $exist = true;
        }

        $file->storeAs("{$this->storage_prefix}/{$folder}", $name,['visibility' => 'public']);       

        // if(!$exist){
        //     $permissionFolder = "./../storage";
        //     Artisan::call('permissions:set', ['folder' => $permissionFolder]);
        //     $output = Artisan::output();
        // }

        return Storage::url($folder.'/'.$name);
    }
    /* public function storeFile(UploadedFile $file, $folder = 'avatar') {
        $name = Str::random(40).".".$file->getClientOriginalExtension();
        $file->storeAs("{$this->storage_prefix}/{$folder}", $name);
        return Storage::url($folder.'/'.$name);
    } */
    
    public function storeFileOriginalName(UploadedFile $file, String $value, $folder = 'avatar') {
        $name = "Documento_equipo_evaluador_$value".".".$file->getClientOriginalExtension();
        $file->storeAs("{$this->storage_prefix}/{$folder}", $name);
        return Storage::url($folder.'/'.$name);
    }

    public function storePDFuser(UploadedFile $file, $folder, $name) {
        $file->storeAs("{$this->storage_prefix}/{$folder}", $name);
        return Storage::url($folder.'/'.$name);
    }

    public function saveImage(UploadedFile $file, $subdirectory = 'logo', $height = 300) {
        try {
            $file_path = $subdirectory. '/' .uniqid().'.'.$file->getClientOriginalExtension();
            Storage::put($this->storage_prefix.'/'.$file_path, $this->makeImage($file, $height)->__toString(), 'public' );
            return (object)["success" => true, "message" => "File has been uploaded successfully", "path" => $file_path ];
        }catch (Exception $exception) {
            $file_name = uniqid().'.'.$file->getClientOriginalExtension();
            $file->storeAs($this->storage_prefix.'/'.$subdirectory, $file_name);
            return (object)["success" => true, "message" => "File has been uploaded successfully", "path" => $subdirectory.'/'.$file_name ];
        }
    }



    public function uploadImage(UploadedFile $uploadedFile = null, $folder = "logo", $height = 300) {
        if (is_null($uploadedFile))
            return null;
        $file = $this->saveImage($uploadedFile, $folder, $height);
        if ($file->success)
            return Storage::url($file->path);
        return null;
    }

    public function isFile(string $path = null)
    {
        return Storage::exists("{$this->storage_prefix}/{$path}");
    }

    public function deleteImage(string $path = null)
    {
        return $this->deleteFile($path);
    }

    public function removeStorage($path)
    {
        return str_replace('/storage', '', $path);
    }

    public function deleteFile(string $path = null)
    {
        $path = $this->removeStorage($path);
        if ($this->isFile($path))
            return Storage::delete("{$this->storage_prefix}/{$path}");
        return false;
    }

    public function deleteMultipleFile(array $paths)
    {
        foreach ($paths as $path) {
            $this->deleteFile($path);
        }

        return true;
    }

    public function filePath(string $path = null)
    {
        $path = $this->removeStorage($path);
        if ($this->isFile($path))
            return Storage::url("{$this->storage_prefix}/{$path}");
        return null;
    }


}
