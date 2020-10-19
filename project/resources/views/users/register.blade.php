@extends('layouts/app')

@section('title', 'Registreren')

@section('content')

    <form action="" method="post">
        {{csrf_field()}}
        
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

@endsection