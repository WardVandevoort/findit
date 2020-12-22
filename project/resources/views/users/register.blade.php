@extends('layouts/app')

@section('title', 'Registreren')

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

        <h2>Create an account</h2>
        <form>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">I am a</legend>
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
                <label for="firstname">First name</label>
                <input type="text" name="firstname" class="form-control" id="firstname">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" class="form-control" id="lastname">
              </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
            <a href="/login">Already have an account?</a>
        </form>
        <hr>
        <a href="/login/linkedin" class="btn btn-linkedin"><i class="fa fa-linkedin"></i> Log in with Linkedin</a>
@endsection