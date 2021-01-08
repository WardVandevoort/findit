@extends('layouts/app')

@section('title', 'Solliciteren')

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/students">Studenten</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/internships">Stages</a>
</li>
@endsection

@section('content')


<h1>{{ $internship->title }}</h1>
<p>{{ $internship->bio }}</p>


<form method="post" action="/applications/create/{{ $internship->id }}">

    {{ csrf_field() }}

    @if( $errors->any() )
    @component('components/alert')
    @slot('type', 'danger')
    <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
    </ul>
    @endcomponent
    @endif

    <div class="form-group">
        <label for="city">Motivatie</label>
        <textarea type="text" class="form-control" id="motivation" name="motivation" rows="5" placeholder="Waarom ben jij de geschikte stagair(e) voor ons bedrijf?"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Solliciteer</button>

</form>
@endsection