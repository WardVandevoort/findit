@extends('layouts/internshipLayout')

@section('title')
{{ $internship->title }}
@endsection

@section('content')

@component('components/nav')

<a class="nav-link" href="/internships">Back</a>

@endcomponent

    <h1>{{ $internship->title }}</h1>

@endsection