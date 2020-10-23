@extends('layouts/indexLayout')

@section('title')
Internships
@endsection

@section('content')
<h1>Internships</h1>

@foreach( $internships as $internship )
<h3><a href="/internships/{{ $internship->id }}">{{ $internship->title }}</a></h3>
@endforeach
@endsection