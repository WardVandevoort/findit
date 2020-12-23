@extends('layouts/app')

@section('title', 'Inloggen')

@section('content')
    @if( $flash = session('error'))
        @component('components/alert')
          @slot('type', 'danger')
            {{ $flash }}
        @endcomponent
    @endif
    <form method="post" action="">
        {{csrf_field()}}
        <h2>Log in</h2>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
        <a href="/register">Don't have an account yet?</a>
    </form>
    <hr>
    <a href="/login/linkedin" class="btn btn-linkedin"><i class="fab fa-linkedin"></i> Log in with Linkedin</a>
@endsection