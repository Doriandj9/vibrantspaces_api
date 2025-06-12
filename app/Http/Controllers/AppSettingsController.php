<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = AppSettings::find(1);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = AppSettings::where('id',$id)
            ->update($request->all());
            return response_success($data);
        } catch (\Throwable $th) {
            return response_error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
