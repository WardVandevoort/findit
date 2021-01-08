<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Flight;


use function PHPUnit\Framework\returnSelf;

class ApplicationController extends Controller
{
    public function index()
    {

        \App\Models\Company::All();
        $userId = Auth::id();
        $companyOwner = \DB::table('users')->select('id')->where("company_admin", 1)->where("id", $userId)->first();

        $data['user'] = \App\Models\User::find(Auth::id());

        if ($data['user']->company_admin == 1) {
            //companyowner is known

            //what company?
            $company =  \App\Models\Company::select('id')->where("admin_id", $userId)->pluck("id");
            //applications for that company
            $companyApplications =  \App\Models\Internship::join('companies', 'companies.id', 'internships.company_id')->where('company_id', $company)->get();
            $internshipid =  \App\Models\Internship::select('internships.id')->join('companies', 'companies.id', 'internships.company_id')->where('company_id', $company)->pluck('id');
            $internships =  \App\Models\Internship::join('applications', 'applications.internship_id', 'internships.company_id')->where('company_id', $company)->get();
            //studentinfo
            $students =  \App\Models\Application::join('users', 'users.id', 'applications.user_id')->where('internship_id', $internshipid)->get();
            return view('applications/company', compact('companyApplications', 'students', 'internships', 'internshipid'));
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
        $application->internship_id = \Request::segment(3);
        $application->save();
        $request->session()->flash('message', 'Proficiat, u heeft gesolliciteerd!');
        return redirect('/');
    }

    public function update(Request $request)
    {

        $internshipid =  $request->input('id');
        \App\Models\Application::where('id', $internshipid)->update(['status' => $request])->limit(1);
        $request->session()->flash('message', 'Application is up to date!');

        return redirect('/applications/company');
    }
}
