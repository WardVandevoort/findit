@extends('layouts/app')

@section('title', 'Studenten')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Stages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/companies">Bedrijven</a>
    </li>
@endsection

@section('content')

    <h1>Students</h1>

    @foreach( $students as $student )
    <h3><a href="/students/{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</a></h3>
    @endforeach
@endsection