<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Flight;
use App\Models\User;

use function PHPUnit\Framework\returnSelf;

class ApplicationController extends Controller
{
    public function index()
    {

        \App\Models\Company::All();
        $userId = Auth::id();

        $data['user'] = User::find(Auth::id());

        if ($data['user']->company_admin == 1) {
            //companyowner is known

            //what company?
            $company =  Company::where("admin_id", $userId)->first();
            $data['applications'] = $company->applications;
            return view('applications/company', $data);
        } else {
            $applications['applications'] =  \App\Models\Internship::join('applications', 'applications.internship_id', 'internships.id')->where('user_id', $userId)->get();
            return view('applications/index', $applications);
        }
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

    public function update(Request $request)
    {
        $flight = Flight::find($internshipid);

        $flight->status = $request;

        $flight->save();
        $request->session()->flash('message', 'Application is up to date!');

        return redirect('/applications/company');
    }
}
