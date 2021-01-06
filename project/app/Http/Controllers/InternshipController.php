<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\User;
use App\Notifications\NewInternship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = Internship::all();
        return view('internships/index', $data);
    }

    public function show($internship)
    {
        $data['internship'] = \App\Models\Internship::where('id', $internship)->first();
        return view('internships/show', $data);
    }

    public function create()
    {
        return view('internships/create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $company = \App\Models\Company::where('id', $request->input('company_id'))->first();
        if( $user->can('update', $company)){

            $internship = new \App\Models\Internship();
            $internship->title = $request->input('title');
            $internship->bio = $request->input('bio');
            $internship->type = $request->input('type');
            $internship->req_skills = $request->input('req_skills');
            $internship->start = $request->input('start');
            $internship->end = $request->input('end');
            $internship->company_id = $request->input('company_id');
            $internship->save();

            $notifReceiver = User::where('company_admin', 0)->get();
            Notification::send($notifReceiver, new NewInternship($internship));

        return redirect('/companies');
        }
        else {
            $request->session()->flash('error', 'You are not authorized to create an internship for this company!');
            return redirect('internships/create/' . $request->input('company_id'));
        }
    }

    public function search(Request $request)
    {
        
        if($request->has('type') && $request->input('type') != null || 
        $request->has('query') && $request->input('query') != null ||
        $request->has('startDate') && $request->input('startDate') != null ||
        $request->has('endDate') && $request->input('endDate') != null) {

            $query = \App\Models\Internship::query();

            if($request->has('type') && $request->input('type') != null){
                $query->where('type', $request->input('type'));
            }

            if($request->has('query') && $request->input('query') != null){
                $query->where('title', 'LIKE', '%' . $request->input('query'). '%')->orWhere('req_skills', 'LIKE', '%' . $request->input('query'). '%');
            }

            if($request->has('startDate') && $request->input('startDate') != null && $request->has('endDate') && $request->input('endDate') != null){
                $query->where('start', '>=', $request->input('startDate'))->where('end', '<=', $request->input('endDate'));
            }

            $internships = $query->get();
            //var_dump($internships);
            return view('welcome')->with('internships', $internships);

        } 
        else {

            $internships = \App\Models\Internship::all();
            return view('welcome')->with('internships', $internships);

        }

    }
}
