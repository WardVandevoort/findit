@extends('layouts/companyLayout')

@section('title')
{{ $company->name }}
@endsection

@section('content')

@component('components/nav')

<a class="nav-link" href="/companies">Back</a>

@endcomponent


<h1><span class="admin">Name: </span>{{ $company->name }}</h1>

<a class="change" id="1" href="#" >Change name</a>

<form class="hidden" id="form1" method="post" action="/companies/update">

    {{ csrf_field() }}

    <div class="form-group">
     <input type="text" class="form-control" id="name" name="name" placeholder="Your new company name">
    </div>
    <a class="btn btn-danger" id="1" href="#" >Cancel</a>
    <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

</form>

<h2><span class="admin">Slogan: </span>{{ $company->slogan }}</h2>

<a class="change" id="2" href="#" >Change slogan</a>

<form class="hidden" id="form2" method="post" action="/companies/update">

    {{ csrf_field() }}

    <div class="form-group">
     <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Your new company slogan">
    </div>
    <a class="btn btn-danger" id="2" href="#" >Cancel</a>
    <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

</form>

<h3><span class="admin">Description: </span>{{ $company->description }}</h3>

<a class="change" id="3" href="#" >Change description</a>

<form class="hidden" id="form3" method="post" action="/companies/update">

    {{ csrf_field() }}

    <div class="form-group">
     <input type="text" class="form-control" id="description" name="description" placeholder="Your new company description">
    </div>
    <a class="btn btn-danger" id="3" href="#" >Cancel</a>
    <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

</form>

    <div>
        <h3>Contact</h3>

        <ul>
            <li>Address: {{ $company->address }}</li>
            <li>City: {{ $company->city }}, {{ $company->postal_code }}</li>
            <li>Province: {{ $company->province }}</li>

            <a class="change" id="4" href="#" >Change address</a>

            <form class="hidden" id="form4" method="post" action="/companies/update">

            {{ csrf_field() }}

            <div class="form-group">
            <input type="text" class="form-control" id="address" name="address" placeholder="Your new company address">
            </div>
            <div class="form-group">
            <label for="city">Change city</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Your new company city">
            </div>
            <div class="form-group">
            <label for="postal_code">Change postal code</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Your new company postal code">
            </div>
            <div class="form-group">
            <label for="province">Change province</label>
            <input type="text" class="form-control" id="province" name="province" placeholder="Your new company province">
            </div>
            <a class="btn btn-danger" id="4" href="#" >Cancel</a>
            <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

            </form>

            <li>Phone: {{ $company->phone }}</li>

            <a class="change" id="5" href="#" >Change phone number</a>

            <form class="hidden" id="form5" method="post" action="/companies/update">

            {{ csrf_field() }}

            <div class="form-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your new company phone number">
            </div>
            <a class="btn btn-danger" id="5" href="#" >Cancel</a>
            <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

            </form>

            <li>Email: {{ $company->email }}</li>

            <a class="change" id="6" href="#" >Change email address</a>

            <form class="hidden" id="form6" method="post" action="/companies/update">

            {{ csrf_field() }}

            <div class="form-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Your new company email address">
            </div>
            <a class="btn btn-danger" id="6" href="#" >Cancel</a>
            <button type="submit" class="btn btn-primary" name="company_id" value="{{ $company->id }}">Save changes</button>

            </form>

        </ul>
    </div>

    <a class="btn btn-primary" href="/internships/create/{{ $company->id }}" >Create internship</a>

    <h2>Internships</h2>
    @foreach( $company->internships as $internship )
    <div>{{ $internship->title }}</div>
    @endforeach
    <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#nearestStations" aria-expanded="false" aria-controls="collapseExample">
            Nearest stations
            </button>
    </p>
    <div class="collapse" id="nearestStations">
        <div class="card card-body">
            <ul class="list-group list-group-flush">
                @foreach( $stations as $station)
                        @if ($station['distance'] < 10500)
                            <li class="list-group-item"> {{ $station['title']}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

@endsection
