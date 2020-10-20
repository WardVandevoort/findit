<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(){
        $data['companies'] = \DB::table('companies')->get();
        return view('companies/index', $data);
    }

    public function show($company){
        $data['company'] = \App\Models\Company::where('id', $company)->with('internships')->first();
        return view('companies/show', $data);
    }
}
