@extends('layouts/homeLayout')

@section('title')
Home
@endsection

@section('content')
@component('components/nav')

<a class="nav-link" href="/students">Students</a>
<a class="nav-link" href="/internships">Internships</a>
<a class="nav-link" href="/companies">Companies</a>

@endcomponent

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