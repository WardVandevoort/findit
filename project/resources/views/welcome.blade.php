@extends('layouts/indexLayout')

@section('title')
Home
@endsection

@section('content')
<h1>Home</h1>

<a class="btn btn-primary" href="/students" >Students</a>
<a class="btn btn-primary" href="/internships" >Internships</a>
<a class="btn btn-primary" href="/companies" >Companies</a>

@endsection