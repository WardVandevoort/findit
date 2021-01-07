@extends('layouts/app')

@section('title', 'Solliciteren')

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/students">Students</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/internships">Internships</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/applications">My applications</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/companies">Companies</a>
</li>
@endsection

@section('content')

<h1>My applications</h1>


@foreach( $internship as $insternship )
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h3>{{ $internship[0]->title}}</h3>

        </div>
        <div class="card-body">
            <h4>Status</h4>
            <p>{{ $internship[0]->status}}</p>
            <h4>motivation</h4>
            <p>{{ $internship[0]->motivation}}</p>

        </div>
    </div>
</div>

@endforeach

@endsection