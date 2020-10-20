@extends('layouts/indexLayout')

@section('title')
Students
@endsection

@section('content')
    <h1>Students</h1>

    @foreach( $students as $student )
    <h3><a href="/students/{{ $student->id }}">{{ $student->firstname . ' ' . $student->lastname }}</a></h3>
    @endforeach
@endsection