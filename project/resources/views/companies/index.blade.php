@extends('layouts/indexLayout')

@section('title')
Companies
@endsection

@section('content')

@component('components/nav')

<a class="nav-link" href="/">Home</a>
<a class="nav-link" href="/students">Students</a>
<a class="nav-link" href="/internships">internships</a>

@endcomponent

    <h1>Companies</h1>

    <a class="btn btn-primary" href="/companies/create" >Add new company</a>

    @foreach( $companies as $company )
    <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
    @endforeach
@endsection

