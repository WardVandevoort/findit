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


@foreach( $applications as $application )
<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h3>{{ $application->title}}</h3>

        </div>
        <div class="card-body">
            <h4>Status</h4>
            @switch($application->status)
            @case(1)
                <p>{{ No answer yet }}</p>
                @break

            @case(2)
                <p>{{ Get in touch with the company }}</p>
                @break
            @case(3)
                <p>{{ Accepted }}</p>
                @break
            @case(2)
                <p>{{ Denied }}</p>
                @break
            @endswitch
            <h4>motivation</h4>
            <p>{{ $application->motivation}}</p>

        </div>
    </div>
</div>

@endforeach

@endsection