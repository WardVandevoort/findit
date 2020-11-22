<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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


        $rules = [
            'motivation' => 'required|min:20',
        ];

        $messages = [
            'motivation.required' => 'Motivatie is vereist.',
            'motivation.min' => 'Voer een motivatie in met minstens 20 karakters.',
        ];

        $validation = $request->validate($rules, $messages);


        $application = new Application();
        $application->motivation = $request->input('motivation');
        $application->user_id = Auth::user()->id;
        $application->internship_id = \Request::segment(3);
        $application->save();
        $request->session()->flash('message', 'Proficiat, u heeft gesolliciteerd!');
    }
}
