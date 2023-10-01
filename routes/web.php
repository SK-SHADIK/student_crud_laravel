<?php

use App\Http\Controllers\UMS\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[StudentController::class, 'viewStudent'])->name('view.student');
Route::get('/create-student',[StudentController::class, 'createStudent'])->name('create.student');
Route::post('/store-student',[StudentController::class, 'storeStudent'])->name('store.student');
Route::get('/edit-student/{id}',[StudentController::class,'showStudent'])->name('edit.student');
Route::post('/edit-store-student',[StudentController::class,'editstudent'])->name('edit.store.student');
Route::get('/delete-student/{id}',[StudentController::class,'deleteStudent'])->name('delete.student');
Route::get('/show-json-student',[StudentController::class,'jsonStudentList']);
Route::get('/create-json-student',[StudentController::class,'jsonStudentCreate']);

