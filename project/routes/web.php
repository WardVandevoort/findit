<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;



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
})->middleware('auth');

Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'handleRegister']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/login/linkedin', [UserController::class, 'redirectToProviderLinkedin']);
Route::get('/login/linkedin/callback', [UserController::class, 'handleProviderLinkedinCallback']);
Route::post('/login', [UserController::class, 'handleLogin']);
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/user/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/user/profile', [UserController::class, 'update'])->middleware('auth');
Route::post('/user/profile/addSkills', [UserController::class, 'addSkills'])->middleware('auth');

//Route INTERNSHIPS
Route::post('/internships', [InternshipController::class, 'store'])->middleware('auth');

Route::get('/internships', [InternshipController::class, 'index'])->middleware('auth');
Route::get('/internships/create/{company_id}', [InternshipController::class, 'create'])->middleware('auth');
Route::get('/internships/{internship}', [InternshipController::class, 'show'])->middleware('auth');
Route::get('/', [InternshipController::class, 'search'])->middleware('auth');

//Route APPLICAITONS
Route::get('/applications', [ApplicationController::class, 'index'])->middleware('auth');
Route::get('/applications/{internship}', [ApplicationController::class, 'show'])->middleware('auth');
Route::get('/applications/create/{internship}', [ApplicationController::class, 'create'])->middleware('auth');
Route::post('/applications/{internship}', [ApplicationController::class, 'store'])->middleware('auth');



//Route STUDENTS
Route::get('/student', function () {
    return view('student');
});
Route::get('/students', [StudentsController::class, 'index'])->middleware('auth');
Route::get('/students/{student}', [StudentsController::class, 'show'])->middleware('auth');

//Route COMPANIES
Route::get('/company', function () {
    return view('company');
});
Route::post('/companies', [CompaniesController::class, 'store'])->middleware('auth');
Route::post('/companies/update', [CompaniesController::class, 'update'])->middleware('auth');
Route::get('/companies/create', [CompaniesController::class, 'create'])->middleware('auth');
Route::get('/companies', [CompaniesController::class, 'index'])->middleware('auth');
Route::get('/companies/{company}', [CompaniesController::class, 'show'])->middleware('auth');
