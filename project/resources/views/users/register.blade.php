@extends('layouts/app')

@section('title', 'Registreren')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/students">Studenten</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Stages</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/companies">Bedrijven</a>
    </li>
@endsection

@section('content')

    <form action="" method="post">
        {{csrf_field()}}
        
        @if( $flash = session('error'))
          @component('components/alert')
            @slot('type', 'danger')
              {{ $flash }}
          @endcomponent
        @endif
        @if( $errors->any() )
          @component('components/alert')
            @slot('type', 'danger')
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endcomponent
        @endif

        <h2>Maak een account aan</h2>
        <form>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Ik ben een</legend>
                <div class="col-sm-10">
                  @foreach($userTypes as $key => $val)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="companyAdmin" id="{{ $val }}" value="{{ $key }}" {{ (old('companyAdmin') == $key ? "checked":"") }} >
                      <label class="form-check-label" for="{{ $val }}">
                        {{ ucfirst($val) }}
                      </label>
                    </div>
                  @endforeach
                </div>
              </div>
            </fieldset>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">Voornaam</label>
                <input type="text" name="firstname" class="form-control" id="firstname">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Achternaam</label>
                <input type="text" name="lastname" class="form-control" id="lastname">
              </div>
            </div>
            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Wachtwoord">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Wachtwoord bevestigen</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Bevestig wachtwoord">
            </div>
            <button type="submit" class="btn btn-primary">Registreren</button>
        </form>
        <hr>
        <a href="/login/linkedin" class="btn btn-linkedin"><i class="fa fa-linkedin"></i> Log in met Linkedin</a>
@endsection