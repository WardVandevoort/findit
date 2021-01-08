@extends('layouts/app')

@section('title', 'Sollicitaties')

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/students">Students</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/internships">Internships</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/applications">Applications</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/companies">Companies</a>
</li>
@endsection

@section('content')
@if( $flash = session('message') )
@component('components/alert')
@slot('type', 'success')
{{ $flash }}
@endcomponent
@endif

@if( $flash = session('error'))
@component('components/alert')
@slot('type', 'danger')
{{ $flash }}
@endcomponent
@endif
<h1>My applications</h1>


<div class="card col-12">
    <div class="row no-gutters">

        <div class="col-12">
            <div class="card-body">
                    {{csrf_field()}}
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Applicant</th>
                                <th scope="col">Internship</th>
                                <th scope="col">Motivation</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $applications as $application )
                                <tr>
                                    <th scope="row" data-id="{{$application->id}}">{{$application->id}}</th>
                                    <td>{{$application->user->firstname}} {{$application->user->lastname}}</td>
                                    <td>{{$application->internship->title}}</td>
                                    <td>{{$application->motivation}}</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control status" data-application="{{$application->id}}">
                                                <option value="1" {{ ($application->status == 1) ? "selected":"" }}>Nog niet bekeken</option>
                                                <option value="2" {{ ($application->status == 2) ? "selected":"" }}>We nemen contact op</option>
                                                <option value="3" {{ ($application->status == 3) ? "selected":"" }}>Geaccepteerd</option>
                                                <option value="4" {{ ($application->status == 4) ? "selected":"" }}>Geweigerd</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td><button data-application="{{$application->id}}" class="btn btn-success btn-update-status m-0">Update</button></td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection