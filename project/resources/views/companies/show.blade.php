@extends('layouts/companyLayout')

@section('title')
{{ $company->name }}
@endsection

@section('content')

    <h1>{{ $company->name }}</h1>

    <a class="btn btn-primary" href="/internships/create/{{ $company->id }}" >Create internship</a>

    <h2>Internships</h2>
    @foreach( $company->internships as $internship )
    <div>{{ $internship->title }}</div>
    @endforeach
@endsection