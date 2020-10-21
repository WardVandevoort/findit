@extends('layouts/internshipLayout')

@section('title')
{{ $internship->title }}
@endsection

@section('content')
     @component('components/alert')
          @slot('type') danger @endslot
          Something went wrong!
     @endcomponent

    <h1>{{ $internship->title }}</h1>

@endsection