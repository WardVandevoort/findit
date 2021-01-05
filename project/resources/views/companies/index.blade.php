@extends('layouts/app')

@section('title', 'Bedrijven')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/students">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Internships</a>
    </li>
@endsection

@section('content')

    <h1>Companies</h1>

    @if( \Auth::user()->company_admin == 1)
    <a class="btn btn-primary" href="/companies/create" >Add new company</a>
    @endif

    @foreach( $companies as $company )
    <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
    @endforeach
@endsection

