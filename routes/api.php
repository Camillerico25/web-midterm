<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentInfoControllerAPI;
use App\Http\Controllers\API\StudentPostController;

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

Route::post('login',[StudentInfoControllerAPI::class,'login']);
Route::post('register',[StudentInfoControllerAPI::class,'register']);
Route::post('reset-password',[StudentInfoControllerAPI::class,'resetPassword']);



Route::get('get-all-posts',[StudentPostController::class,'getAllPosts']);
Route::get('get-post',[StudentPostController::class,'getPost']);
Route::get('search-post',[StudentPostController::class,'searchPost']);
