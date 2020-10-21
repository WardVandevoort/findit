<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;


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


Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'handleRegister']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'handleLogin']);

//Route INTERNSHIPS
Route::get('/internships', [InternshipController::class, 'index']);
Route::get('/internships/{internship}', [InternshipController::class, 'show']);

//Route STUDENTS
Route::get('/student', function () {
    return view('student');
});
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/students/{student}', [StudentsController::class, 'show']);

//Route COMPANIES
Route::get('/company', function () {
    return view('company');
});
Route::get('/companies', [CompaniesController::class, 'index']);
Route::get('/companies/{company}', [CompaniesController::class, 'show']);
