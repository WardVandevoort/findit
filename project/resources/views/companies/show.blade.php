@extends('layouts/companyLayout')

@section('title')
{{ $company->name }}
@endsection

@section('content')
     @component('components/alert')
          @slot('type') danger @endslot
          Something went wrong!
     @endcomponent

    <h1>{{ $company->name }}</h1>

    <h2>Internships</h2>
    @foreach( $company->internships as $internship )
    <div>{{ $internship->title }}</div>
    @endforeach
@endsection