<?php

use App\Http\Controllers\UMS\StudentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/view-students',[StudentApiController::class, 'viewApiStudent']);
Route::get('/create-students',[StudentApiController::class, 'createApiStudent']);
Route::post('/store-students',[StudentApiController::class, 'storeApiStudent']);
Route::get('/show-students/{id}',[StudentApiController::class, 'showApiStudent']);
Route::post('/edit-students',[StudentApiController::class, 'editApiStudent']);
Route::get('/delete-students/{id}',[StudentApiController::class, 'deleteApiStudent']);
