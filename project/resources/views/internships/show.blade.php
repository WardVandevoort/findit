@extends('layouts/internshipLayout')

@section('title')
{{ $internship->title }}
@endsection

@section('content')

    <h1>{{ $internship->title }}</h1>

@endsection