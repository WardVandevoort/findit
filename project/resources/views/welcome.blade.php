@extends('layouts/app')
@extends('layouts/homeLayout')

@section('content')
<div class="search-containter">
    <h1>Stageplaatsen</h1>
    <p>{{$internships->count()}} stageplaats(en)</p>
    @foreach($internships as $internship)
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
            </div>
            <div class="card-body">
                <p>{{ $internship->bio }}</p>

            </div>

        </div>
    </div>
    @endforeach
</div>
@endsection