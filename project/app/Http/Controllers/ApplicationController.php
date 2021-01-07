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
        $userId = Auth::id();
        $company = \DB::table('users')->select('id')->where("company_admin", 1)->where("id", $userId)->first();
        if ($company == $userId) {
            return view('applications/index2');
        }
        $internship['internship'] = \DB::table('applications')->join('internships', 'applications.internship_id', 'internships.id')->where('user_id', $userId)->get();
        return view('applications/index', $internship);
    }

    public function show($application)
    {
        $application =  \DB::table('applications')->whereIn('id', $application)->first();
    }

    public function create($internship)
    {
        $data['application'] = \DB::table('applications')->get();
        $data2['internship'] = \App\Models\Internship::where('id', $internship)->first();

        if (Auth::user()) { // Check is user logged in
            session(['internship' => $data2]);
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

        $application = new Application();
        $application->motivation = $request->input('motivation');
        $application->user_id = Auth::user()->id;
        $application->internship_id = \Request::segment(2);
        $application->save();
        $request->session()->flash('message', 'Proficiat, u heeft gesolliciteerd!');
        return redirect('/');
    }
}
