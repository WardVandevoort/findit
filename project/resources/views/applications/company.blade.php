@extends('layouts/app')

@section('title', 'Solliciteren')

@section('nav')
<li class="nav-item">
    <a class="nav-link" href="/students">Students</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/internships">Internships</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/applications">My applications</a>
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
                @foreach( $students as $student )
                <h5 class="card-title">{{$student->firstname}}</h5>
                @endforeach
                @foreach($companyApplications as $companyApplication)
                <p class="card-text">internship: {{$companyApplication->title}}</p>
                @endforeach

                @foreach($internships as $internship)
                <p class="card-text">motivation: {{$internship->motivation}}</p>
                @endforeach

                <form action="/applications/company" method="post">
                    {{csrf_field()}}

                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" {{ ($internship->status == "" ? "selected":"") }}>Choose a status:</option>
                            <option value="1" {{ ($internship->status == "1" ? "selected":"") }}>1</option>
                            <option value="2" {{ ($internship->status == "2" ? "selected":"") }}>2</option>
                            <option value="3" {{ ($internship->status == "3" ? "selected":"") }}>3</option>
                            <option value="0" {{ ($internship->status == "0" ? "selected":"") }}>0</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $internship->internship_id }}">


                    <button type=" submit" class="btn btn-primary">Update status</button>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection