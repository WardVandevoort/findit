@extends('layouts/app')

@section('title', 'Stages')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/students">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/companies">Companies</a>
    </li>
@endsection

@section('content')

<h1>Internships</h1>

@foreach( $internships as $internship )
<h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
@endforeach
@endsection