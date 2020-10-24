<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \DB::table('internships')->get();
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
        $internship = new \App\Models\Internship();
        $internship->title = $request->input('title');
        $internship->bio = $request->input('bio');
        $internship->req_skills = $request->input('req_skills');
        $internship->start = $request->input('start');
        $internship->end = $request->input('end');
        $internship->company_id = $request->input('company_id');
        $internship->save();

        return redirect('/companies');
    }

    public function search(Request $request)
    {
        $search_text = $request->input('query');
        $internships = \App\Models\Internship::where('title', 'LIKE', '%' . $search_text . '%')->paginate(10);
        return view('welcome')->with('internships', $internships);
    }
}
