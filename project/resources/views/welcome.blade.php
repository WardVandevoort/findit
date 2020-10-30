@extends('layouts/app')

@section('title', 'Home')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/students">Studenten</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Stages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/companies">Bedrijven</a>
    </li>
@endsection

@section('content')

<form class="form-group" type="get" action="{{url('/')}}">
    <input class="form-control" name="query" type="search" placeholder="zoek stageplaats" value="{{request()->input('query')}}">
    <button class="btn btn-primary" type="submit">Zoek</button>
</form>

<div class="search-containter">
    <h1>Stageplaatsen</h1>
    <p>{{$internships->count()}} Stageplaats(en)</p>
    @if ($internships->count() > 0)

    @foreach($internships as $internship)
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
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