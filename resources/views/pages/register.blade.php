@extends('layouts.empty')

@section('main-content')
<!-- Full-page background gradient using Bootstrap's utility classes -->
<section class="vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(to right, #28a745, #007bff);">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%; border-radius: 20px; background: white;">
    <div class="card-body">
      <a href="/" class="text-decoration-none text-white position-absolute top-0 start-0 m-3">
        <h2><i class="bi bi-arrow-left-circle text-white"></i></h2>
      </a>
      <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Register Now</h2>
      </div>
      <form action='/register' method='post'>
        @csrf
        <!-- First Name and Username inputs in a grid layout -->
        <div class="row mb-4">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" placeholder="Your name" name="name" value="{{ old('name') }}">
              <label for="floatingName">Name</label>
              @error('name')
              <div class="invalid-feedback text-start">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingUsername" placeholder="Your username" name="username" value="{{ old('username') }}">
              <label for="floatingUsername">Username</label>
              @error('username')
              <div class="invalid-feedback text-start">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>

        <!-- NIS/NIP input -->
        <div class="form-floating mb-4">
          <input type="number" class="form-control @error('nis_nip') is-invalid @enderror" id="floatingNisNip" placeholder="Your NIS / NIP" name="nis_nip" value="{{ old('nis_nip') }}">
          <label for="floatingNisNip">NIS / NIP</label>
          @error('nis_nip')
          <div class="invalid-feedback text-start">{{ $message }}</div>
          @enderror
        </div>

        <!-- Email input -->
        <div class="form-floating mb-4">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="Your email address" name="email" value="{{ old('email') }}">
          <label for="floatingEmail">Email address</label>
          @error('email')
          <div class="invalid-feedback text-start">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password input -->
        <div class="form-floating mb-4">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Your password" name="password">
          <label for="floatingPassword">Password</label>
          @error('password')
          <div class="invalid-feedback text-start">{{ $message }}</div>
          @enderror
        </div>

        <!-- Register button -->
        <button type="submit" class="btn btn-primary btn-block w-100 mb-4 transition-all duration-300 hover:scale-105 hover:shadow-lg">
          Register
        </button>

        <!-- Sign in link -->
        <div class="text-center">
          <p>Already registered? <a href="/login" class="text-decoration-none text-primary">Sign in now!</a></p>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
