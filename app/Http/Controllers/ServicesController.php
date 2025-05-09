<?php

namespace App\Http\Controllers;

use App\Core\DocStatus;
use App\Services\ServicesService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function __construct(private ServicesService $service){}
    public function index()
    {
        try {
            $data = $this->service
            ->where(DocStatus::COLUMN_NAME, DocStatus::ACTIVE)
            ->get();
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    public function setImg(Request $request, $id){
        try {
            if(!$request->hasFile('picture')){
                throw new \ErrorException('No has enviado la img para guardar');
            }
            $file = $request->file('picture');
            $folder = "admin/services/$id/picture";
            $path = storeFile($file,$folder);
            $extra = ['picture' => $path];
            $data = $this->service
            ->update($id,$extra,false);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = $this->service->findOrFail($id);
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
