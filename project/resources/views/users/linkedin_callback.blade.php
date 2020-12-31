@extends('layouts/app_without_nav')

@section('title', 'School email')

@section('content')
  <div class="row">
    <div class="col-md-6 m-auto">
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
      
      <div class="card p-4 mb-3">
        <div class="card-body">
          <div id="app">
            <h2>@{{ title }}</h2>
            <form ref="form" v-bind:action="formPath" method="post">
              {{csrf_field()}}
              <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" class="form-control" v-bind:class="emailValidClass" id="email" name="email">
                <div v-bind:class="emailFbClass" id="emailHelpBlock">
                  <li v-for="error in emailErrors">
                    @{{ error }}
                  </li>
                </div>
              </div>
              <div class="form-group" v-if="accountExist">
                <label for="password">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <button type="submit" v-on:click.prevent="checkEmail" class="btn btn-primary float-right">Volgende</button>
              <button type="button" v-if="showBackButton" v-on:click.prevent="createAccount" class="btn btn-outline-primary">Maak een account aan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection