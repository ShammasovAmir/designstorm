@extends('layouts.main')

@section('title')
  Design Strom - Inspiration for developers
@endsection

@section('content')
  <div id="site-section">
    <div class="container">
      <div id="auth">
        <div class="row">
          <div class="col-md-offset-4 col-md-4">
            <div class="box">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                  <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-check">
                      <div class="col-xs-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                          {{ old('remember') ? 'checked' : '' }}>
                      </div>

                      <div class="col-xs-8">
                        <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-0">
                  <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Login') }}
                    </button>
                  </div>
                  <div class="col-md-12">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <br>
                    <a class="btn btn-link" href="{{ route('register') }}">
                      Don't have an account? Register
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection