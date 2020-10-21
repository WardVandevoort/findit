<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\StudentsController;


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

Route::post('/internships', [InternshipController::class, 'store']);

Route::get('/internships', [InternshipController::class, 'index']);

Route::get('/internships/create', [InternshipController::class, 'create']);

Route::get('/internships/{internship}', [InternshipController::class, 'show']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/student_profile', function () {
    $results = DB::table('users')->get();

    dd($results);
});

Route::get('/company_profile', function () {
    return view('com
    pany_profile');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/students', [StudentsController::class, 'index']);

Route::get('/students/{student}', [StudentsController::class, 'show']);

Route::get('/company', function () {
    return view('company');
});

Route::get('/companies', [CompaniesController::class, 'index']);

Route::get('/companies/{company}', [CompaniesController::class, 'show']);


