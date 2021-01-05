@extends('layouts/app')

@section('title', 'Home')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/students">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Internships</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/companies">Companies</a>
    </li>
@endsection

@section('content')

<form class="form-group" type="get" action="{{url('/')}}">
    <div>
            <select class="btn btn-primary" name="type" id="type">
                <option value="" selected>Choose a type</option>
                <option value="Design">Design</option>
                <option value="Development">Development</option>
            </select>
    </div>

    <label for="startDate">Internship start date</label>
    <input class="form-control" name="startDate" type="date" placeholder="jjjj-mm-dd" value="{{request()->input('startDate')}}">

    <label for="endDate">Internship end date</label>
    <input class="form-control" name="endDate" type="date" placeholder="jjjj-mm-dd" value="{{request()->input('endDate')}}">

    <label for="query"></label>
    <input class="form-control" name="query" type="search" placeholder="search internship" value="{{request()->input('query')}}">
    <button class="btn btn-primary" type="submit">Search</button>
</form>

<div class="search-containter">
    <h1>Internships</h1>
    <p>{{$internships->count()}} internship(s)</p>
    @if ($internships->count() > 0)

    @foreach($internships as $internship)
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
                <p>{{ $internship->type }}</p>
                <p>from: {{ $internship->start }} until: {{ $internship->end }}</p>
            </div>
            <div class="card-body">
                <p>{{ $internship->bio }}</p>

            </div>
        </div>
    </div>
    @endforeach

    @else
    <div>geen stageplaatsen beschikbaar</div>
    @endif
</div>
@endsection