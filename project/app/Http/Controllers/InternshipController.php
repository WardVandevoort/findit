<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index(){
        $data['internships'] = \DB::table('internships')->get();
        return view('internships/index', $data);
    }
}
