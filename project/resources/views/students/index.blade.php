@extends('layouts/indexLayout')

@section('title')
Students
@endsection

@section('content')

@component('components/nav')

<a class="nav-link" href="/">Home</a>
<a class="nav-link" href="/internships">Internships</a>
<a class="nav-link" href="/companies">Companies</a>

@endcomponent

    <h1>Students</h1>

    @foreach( $students as $student )
    <h3><a href="/students/{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</a></h3>
    @endforeach
@endsection