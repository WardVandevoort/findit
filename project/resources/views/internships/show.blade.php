@extends('layouts/app')

@section('title', $internship->title)

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/internships">Back</a>
</li>
@endsection

@section('content')

<h1>{{ $internship->title }}</h1>
<a href="/applications/create/{{ $internship->id }}">solliciteer</a>

@endsection