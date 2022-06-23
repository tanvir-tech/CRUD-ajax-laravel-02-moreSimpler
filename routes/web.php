<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', function () {
    return view('student-form');
});

Route::post('/student/add', [StudentController::class, 'addStudent']);
Route::get('/student/all', [StudentController::class, 'listStudent']);

Route::get('/student/delete/{id}', [StudentController::class,'deleteStudent']);

Route::get('/student/getvaluesToEdit/{id}',[StudentController::class,'getvaluesToEdit']);
Route::post('/student/update/{id}',[StudentController::class,'updateStudent']);