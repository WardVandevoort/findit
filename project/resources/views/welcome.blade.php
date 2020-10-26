@extends('layouts/app')
@extends('layouts/homeLayout')


@section('content')
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

                <a class="btn btn-primary" href="/students">Students</a>
                <a class="btn btn-primary" href="/internships">Internships</a>
                <a class="btn btn-primary" href="/companies">Companies</a>
            </div>
        </div>
    </div>
    @endforeach

    @else
    <div>geen stageplaatsen beschikbaar</div>
    @endif
</div>
@endsection