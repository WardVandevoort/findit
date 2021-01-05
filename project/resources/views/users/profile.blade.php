@extends('layouts/app')

@section('title', 'Profiel')

@section('nav')
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/students">Students</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/internships">Internships</a>
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
        <div class="card-header">Curriculum Vitae</div>
        <div class="card-body">
          <h5>My skills</h5>
          <ul class="list-group list-group-flush">
            {{ (count($user->skills) == 0) ? "No skills added":"" }}
            @foreach($user->skills as $skill)
              <li class="list-group-item">{{ $skill->name }} 
                @component('components/progress')
                  @slot('value', $skill->pivot->progress)
                  {{ $skill->pivot->progress }}
                @endcomponent
              </li>
            @endforeach
          </ul>
          <form action="/user/profile/addSkills" method="post" class="mt-4">
            {{csrf_field()}}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="skills">Skill</label>
                <select class="form-control @error('skills') is-invalid @enderror" name="skills" id="skills" area-described-by="validationSkills">
                  <option value="">--Select a skill--</option>
                  @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                  @endforeach
                </select>
                @error('skills')
                    <div id="validationSkills" class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="progress">Progress</label>
                <input type="range" class="form-control-range py-2 @error('progress') is-invalid @enderror" min="0" max="100" step="25" id="progress" name="progress" value="0" area-described-by="validationProgress">
                @error('progress')
                    <div id="validationProgress" class="form-text text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Add skill</button>
          </form>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">Personal information</div>
        <div class="card-body">
          <form action="/user/profile" method="post">
            {{csrf_field()}}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="firstname">First name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}">
              </div>
              <div class="form-group col-md-6">
                <label for="lastname">Last name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}">
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
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
            <button type="submit" class="btn btn-primary float-right">Update</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <h2>Account settings</h2>
    </div>
  </div>
@endsection