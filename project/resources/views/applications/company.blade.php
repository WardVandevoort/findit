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


<div class="card" style="max-width: 500px;">
    <div class="row no-gutters">

        <div class="col-sm-10">
            <div class="card-body">

                <form action="/applications/company" method="post">
                    {{csrf_field()}}
                    @foreach( $applications as $application )
                        <h5 class="card-title">{{$application}}</h5>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Update status</button>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection