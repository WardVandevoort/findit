@extends('layouts/indexLayout')

@section('title')
Companies
@endsection

@section('content')
    <h1>Companies</h1>

    <a class="btn btn-primary" href="/companies/create" >Add new company</a>

    @foreach( $companies as $company )
    <h3><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></h3>
    @endforeach
@endsection

