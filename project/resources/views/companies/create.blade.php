@extends('layouts/app')

@section('title', 'Creëer een bedrijf')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/companies">Back</a>
    </li>
@endsection

@section('content')

    <h1>Create company</h1>

    <form method="post" action="/companies">

     {{ csrf_field() }}

     <!--<div class="form-group">
     <label for="name">Company name</label>
     <input type="text" class="form-control" id="name" name="name" placeholder="Your company name">
     </div>

     <div class="form-group">
     <label for="city">City name</label>
     <input type="text" class="form-control" id="city" name="city" placeholder="City name">
     </div>

     <button type="submit" class="btn btn-primary">Create company</button>

     </form>!-->
    <div class="form-row">
    <div class="col">

     <input type="text" class="form-control" id="name" name="name" placeholder="Your company name">

     <div class="match-list"></div>
    </div>

    <div class="col">
      <input type="text" class="form-control" id="address" name="address" disabled placeholder="Address">

    </div>

    <div class="col">
      <input type="text" class="form-control" id="city" name="city" disabled placeholder="City name" value="">
    </div>


     <button type="submit" class="btn btn-primary createCompanyBtn">Create company</button>

  </div>







@endsection
