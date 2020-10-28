@extends('layouts/indexLayout')

@section('title')
Internships
@endsection

@section('content')

@component('components/nav')

<a class="nav-link" href="/">Home</a>
<a class="nav-link" href="/students">Students</a>
<a class="nav-link" href="/companies">Companies</a>

@endcomponent

<h1>Internships</h1>

@foreach( $internships as $internship )
<h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
@endforeach
@endsection