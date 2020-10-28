@extends('layouts/app')

@section('title', 'Profiel aanpassen')

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h2>Profiel</h2>
      @if( $flash = session('message') )
        @component('components/alert')
          @slot('type', 'success')
          {{ $flash }}
        @endcomponent
      @endif
      <div class="card">
        <div class="card-header">
          Persoonlijke informatie
        </div>
        <div class="card-body">
          <form action="/user/profile" method="post">
            {{csrf_field()}}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">Voornaam</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Achternaam</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
              </div>
            </div>
            <div class="form-group">
              <label for="email">E-mailadres</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="phone">GSM</label>
              <input type="tel" class="form-control" id="phone" name="phone" maxlength="10" minlength="10" value="{{ $user->phone }}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dateOfBirth">Geboortedatum</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="{{ $user->date_of_birth }}">
              </div>
              <div class="form-group col-md-6">
                <label for="gender">Geslacht</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="" {{ ($user->gender == "" ? "selected":"") }}>Kies een geslacht:</option>
                  <option value="male" {{ ($user->gender == "male" ? "selected":"") }}>Man</option>
                  <option value="female" {{ ($user->gender == "female" ? "selected":"") }}>Vrouw</option>
                  <option value="unknown" {{ ($user->gender == "unknown" ? "selected":"") }}>Onbekend</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="address">Straat</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="city">Stad</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}">
              </div>
              <div class="form-group col-md-4">
              <label for="province">Provincie</label>
              <input type="text" class="form-control" id="province" name="province" value="{{ $user->province }}">
              </div>
              <div class="form-group col-md-2">
                <label for="postal_code">Postcode</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $user->postal_code }}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Update</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h2>Account instellingen</h2>
    </div>
  </div>
@endsection