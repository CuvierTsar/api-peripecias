<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\peripeciasController;

Route::get('/', function(){
    return response()->json([
        'Success' => true
    ]);
});

Route::get('/peripecias',[peripeciasController::class,'index']);
Route::get('/peripecias/{id}',[peripeciasController::class,'show']);
Route::post('/peripecias',[peripeciasController::class,'store']);
Route::delete('/peripecias/{id}',[peripeciasController::class,'destroy']);
Route::put('/peripecias/{id}',[peripeciasController::class,'update']);