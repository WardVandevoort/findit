<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $data['students'] = \DB::table('users')->get();
        return view('students/index', $data);
    }

    public function show($student){
        $data['student'] = \DB::table('users')->where('id', $student)->first();
        return view('students/show', $data);
    }
}
