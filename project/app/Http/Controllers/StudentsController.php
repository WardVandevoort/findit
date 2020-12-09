<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $data['students'] = \App\Models\User::all();
        return view('students/index', $data);
    }

    public function show($student){
        $student = \App\Models\User::where('id', $student)->first();
        dd($student);
    }
}
