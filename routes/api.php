<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('security/attempt',[AuthController::class,'authLogin']);
    Route::post('security/logout',[AuthController::class,'logout'])
    ->middleware('auth:sanctum');
    Route::prefix('services')->group(function () {
        Route::get('/', [ServicesController::class,'index']);
        Route::get('{id}', [ServicesController::class,'show']);
        Route::post('set-img/{id}', [ServicesController::class,'setImg'])->middleware('auth:sanctum');
    });
});