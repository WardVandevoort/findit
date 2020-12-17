@extends('layouts/app')

@section('title', $company->name)

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/companies">Back</a>
    </li>
@endsection

@section('content')

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
    <!-- Card Nearest stations & Public transport score -->
<div class="card text-center" style="width: 18rem;"  id="nearestStations">

<div class="card-header nearestStation">
<h3>Nearest stations</h3>
</div>
  <!-- Card content -->
  <div class="card-body pb-3" style="padding-bottom:0px!important;">


    <div class="flex mb-4">
      <i class="fas fa-train fa-lg text-info pr-2"></i>
      <p>Public transport score</p>
    </div>
    <div class="flex justify-content-between ">


      <p class="display-4 degree ">{{$roundedScore ?? ''}}/10</p>

    <div class="display-7 alert alert-danger scoreErrmsg" role="alert">
  {{$errormsg ?? ''}}
    </div>

    </div>


    <div class="card-header">
        Station
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
                @foreach( $stations as $station)

        <li class="list-group-item"> {{ $station['title']}}</li>

                @endforeach
            </ul>
      </div>





  </div>

</div>
<!-- Card -->

@endsection
