@extends('layouts/app')

@section('title', $internship->title)

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/internships">Back</a>
</li>
@endsection

@section('content')

<h1>{{ $internship->title }}</h1>

<p>{{ $internship->bio }}</p>

<p><strong>Type of internship:</strong> {{ $internship->type }}</p>

<p><strong>Required skills:</strong> {{ $internship->req_skills }}</p>

<p><strong>Start of internship:</strong> {{ $internship->start }}</p>

<p><strong>End of internship:</strong> {{ $internship->end }}</p>

<a class="btn btn-primary" href="/applications/create/{{ $internship->id }}">apply</a>

@endsection