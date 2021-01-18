<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('course')->group(function (){
    Route::get('getlist',[CourseController::class,'index']);
    Route::post('create',[CourseController::class,'create']);
    Route::post('update/{id}',[CourseController::class,'update']);
    Route::delete('delete/{id}',[CourseController::class,'destroy']);
});
