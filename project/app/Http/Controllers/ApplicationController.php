<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ApplicationController extends Controller
{
    public function index()
    {
    }

    public function show($application)
    {
        $application =  \DB::table('applications')->where('id', $application)->first();
    }

    public function create($internship)
    {
        $data['application'] = \DB::table('applications')->get();
        $data2['internship'] = \App\Models\Internship::where('id', $internship)->first();

        if (Auth::user()) { // Check is user logged in
            return view("applications/create", $data, $data2);
        } else {
            return redirect('/login');
        }
    }

    public function store(Request $request)
    {
        $application = new Application();
        $application->motivation = $request->input('motivation');
        $application->user_id = Auth::user()->id;
        $application->internship_id = \Request::segment(2);
        $application->save();

        return redirect('/applications');
    }
}
