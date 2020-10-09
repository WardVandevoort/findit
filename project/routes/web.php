<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/student_profile', function () {
    return view('student_profile');
});

Route::get('/company_profile', function () {
    return view('company_profile');
});

Route::get('/internship', function () {
    return view('internship');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/company', function () {
    return view('company');
});
