@extends('layouts/companyLayout')

@section('title')
{{ $company->name }}
@endsection

@section('content')
<form method="post" action="">

     {{ csrf_field() }}

    <h1><span class="admin">Name: </span>{{ $company->name }}</h1>
    <div class="form-group">
     <label for="name">Change name</label>
     <input type="text" class="form-control" id="name" name="name" placeholder="Your new company name">
    </div>

    <h2><span class="admin">Slogan: </span>{{ $company->slogan }}</h2>
    <div class="form-group">
     <label for="slogan">Change slogan</label>
     <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Your new company slogan">
    </div>

    <h3><span class="admin">Description: </span>{{ $company->description }}</h3>
    <div class="form-group">
     <label for="bio">Change description</label>
     <input type="text" class="form-control" id="bio" name="bio" placeholder="Your new company description">
    </div>

    <div>
        <h3>Contact</h3>

        <ul>
            <li>Address: {{ $company->address }}</li>
            <li>City: {{ $company->city }}, {{ $company->postal_code }}</li>
            <li>Province: {{ $company->province }}</li>
            <div class="form-group">
            <label for="address">Change address</label>
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

            <li>Phone: {{ $company->phone }}</li>
            <div class="form-group">
            <label for="phone">Change phone number</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your new company phone number">
            </div>

            <li>Email: {{ $company->email }}</li>
            <div class="form-group">
            <label for="email">Change email address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Your new company email address">
            </div>

        </ul>
    </div>

    <button type="submit" class="btn btn-primary">Update company profile</button>

</form>

    <a class="btn btn-primary" href="/internships/create/{{ $company->id }}" >Create internship</a>

    <h2>Internships</h2>
    @foreach( $company->internships as $internship )
    <div>{{ $internship->title }}</div>
    @endforeach
@endsection