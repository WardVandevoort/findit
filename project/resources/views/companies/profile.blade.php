@extends('layouts/app')

@section('title', 'Profiel')

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
<div class="row">
  <div class="col-md-8">
    <h2>Profile</h2>
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


    <div class="card mb-3">
      <div class="card-header">Company information</div>
      <div class="card-body">
        <form action="" method="">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputName">Company name</label>
              <input type="text" class="form-control" id="inputName" placeholder="Company name">
            </div>
            <div class="form-group col-md-6">
              <label for="companyEmail">Company email</label>
              <input type="text" class="form-control" id="firstname" name="companyEmail" placeholder="Company Email" value="">
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Company Phone</label>
              <input type="tel" class="form-control" id="lastname" name="lastname" placeholder="Company Phone" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Company address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Company address">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="province">Province</label>
              <input type="text" class="form-control" id="Province" name="province" value="">
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
          </div>

          <button type="submit" class="btn btn-primary float-right">Update company info</button>



        </form>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Company owner information</div>
      <div class="card-body">
        <form action="/user/profile" method="post">
          {{csrf_field()}}
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstname">Company owner firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
            </div>
            <div class="form-group col-md-6">
              <label for="lastname">Company owner lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
            </div>
          </div>
          <div class="form-group">
            <label for="email">Company email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
          </div>
          <div class="form-group">
            <label for="phone">Company phone number</label>
            <input type="tel" class="form-control" id="phone" name="phone" maxlength="20" minlength="10" value="{{ $user->phone }}">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="dateOfBirth">Date of birth</label>
              <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="{{ $user->date_of_birth }}">
            </div>
            <div class="form-group col-md-6">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="" {{ ($user->gender == "" ? "selected":"") }}>Choose a gender:</option>
                <option value="male" {{ ($user->gender == "male" ? "selected":"") }}>Man</option>
                <option value="female" {{ ($user->gender == "female" ? "selected":"") }}>Woman</option>
                <option value="unknown" {{ ($user->gender == "unknown" ? "selected":"") }}>Other</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="address">Street</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
            </div>
            <div class="form-group col-md-4">
              <label for="province">Province</label>
              <input type="text" class="form-control" id="province" name="province" value="{{ $user->province }}">
            </div>
            <div class="form-group col-md-2">
              <label for="postal_code">Postal code</label>
              <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $user->postal_code }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-right">Update owner info</button>
        </form>

      </div>
    </div>
    @endsection