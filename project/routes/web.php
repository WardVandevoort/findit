<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;


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
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/login/linkedin', [UserController::class, 'redirectToProviderLinkedin']);
Route::get('/login/linkedin/callback', [UserController::class, 'handleProviderLinkedinCallback']);
Route::post('/login', [UserController::class, 'handleLogin']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/user/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/user/profile', [UserController::class, 'update']);
Route::post('/user/profile/addSkills', [UserController::class, 'addSkills']);

//Route INTERNSHIPS
Route::post('/internships', [InternshipController::class, 'store']);

Route::get('/internships', [InternshipController::class, 'index']);
Route::get('/internships/create/{company_id}', [InternshipController::class, 'create']);
Route::get('/internships/{internship}', [InternshipController::class, 'show']);
Route::get('/', [InternshipController::class, 'search']);

//Route APPLICAITONS
Route::get('/applications', [ApplicationController::class, 'index']);
Route::get('/applications/{internship}', [ApplicationController::class, 'show']);
Route::get('/applications/create/{internship}', [ApplicationController::class, 'create']);
Route::post('/applications/{internship}', [ApplicationController::class, 'store']);



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
Route::post('/companies', [CompaniesController::class, 'store']);
Route::post('/companies/update', [CompaniesController::class, 'update']);
Route::get('/companies/create', [CompaniesController::class, 'create']);
Route::get('/companies', [CompaniesController::class, 'index']);
Route::get('/companies/{company}', [CompaniesController::class, 'show']);
