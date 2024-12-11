@extends('layouts.empty')

@section('main-content')
<section class="vh-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #32CD32, #00BFFF);">
  <div class="card mx-4 mx-md-5 shadow-lg p-4" style="background: rgba(255, 255, 255, 0.95); border-radius: 15px; width: 100%; max-width: 500px;">
    <div class="card-body">
      <a href="/" class="text-decoration-none text-dark position-absolute top-0 start-0 m-3">
        <h2><i class="bi bi-arrow-left-circle"></i></h2>
      </a>
      <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Sign in Now</h2>
      </div>
      <form action='/login' method="post">
        @csrf
        <!-- Username input -->
        <div class="form-floating mb-4">
          <input type="text" class="form-control border-primary shadow-sm @error('username') is-invalid @enderror" id="usernameInput" placeholder="Username" name="username" value="{{ old('username') }}" required>
          <label for="usernameInput">Username</label>
          @error('username')
          <div class="invalid-feedback text-start">{{ $message }}</div>
          @enderror
        </div>

        <!-- Password input -->
        <div class="form-floating mb-4">
          <input type="password" class="form-control border-primary shadow-sm @error('password') is-invalid @enderror" id="passwordInput" placeholder="Password" name="password" required>
          <label for="passwordInput">Password</label>
          @error('password')
          <div class="invalid-feedback text-start">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm mb-4 w-100 text-uppercase fw-bold transition-all duration-300 hover:scale-105 hover:shadow-lg">
          Sign in
        </button>

        <!-- Register link -->
        <p class="mt-3">Not registered yet? <a href="/register" class="text-decoration-none text-primary fw-bold">Register now!</a></p>
      </form>
    </div>
  </div>
</section>
@endsection
