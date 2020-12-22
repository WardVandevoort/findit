@extends('layouts/app')

@section('title', $student->firstname . " " . $student->lastname)

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/students">Back</a>
    </li>
@endsection

@section('content')

<h1>{{ $student->firstname }} {{ $student->lastname }}</h1>

<p><strong>Gender:</strong> {{ $student->gender }}</p>

<p><strong>Date of birth:</strong> {{ $student->date_of_birth }}</p>

<h3>Contact</h3>

<p><strong>Address:</strong> {{ $student->address }}, {{ $student->city }} {{ $student->postal_code }}</p>

<p><strong>Province:</strong> {{ $student->province }}</p>

<p><strong>Phone:</strong> {{ $student->phone }}</p>

<p><strong>Email:</strong> {{ $student->email }}</p>

@endsection