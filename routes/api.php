<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::post('upload',[ServicesController::class,'upload']);
    Route::post('security/attempt',[AuthController::class,'authLogin']);
    Route::post('security/logout',[AuthController::class,'logout'])
    ->middleware('auth:sanctum');

    Route::put('settings/user/{id}',[AuthController::class,'updateAccount'])
    ->middleware('auth:sanctum');

    Route::prefix('services')->group(function () {
        Route::get('/', [ServicesController::class,'index']);
        Route::get('{id}', [ServicesController::class,'show']);
        Route::post('set-img/{id}', [ServicesController::class,'setImg'])->middleware('auth:sanctum');
    });
    Route::prefix('data-services')->group(function () {
        Route::get('/', [ServicesController::class,'indexData']);
        Route::post('/', [ServicesController::class,'storeData']);
        Route::post('send-confirmation', [ServicesController::class,'sendConfirmation'])->middleware('auth:sanctum');
        Route::post('send-message', [ServicesController::class,'sendMessage']); 
        Route::put('notification/{id}', [ServicesController::class,'updateNotification']);
        Route::put('{id}', [ServicesController::class,'updateServiceData']);
        Route::get('messages', [ServicesController::class,'indexMessages'])->middleware('auth:sanctum');
        Route::get('user/{tax_id}', [ServicesController::class,'showUserByTaxId']);
    });
});

// Route::get('mail', function (Request $request) {
//     return view('emails.confirmation')->with('options', ['invoice_id' => 'KT-2221331', 'invoice_total' => '5445' ,'download_link' => 'thhps']);
// });