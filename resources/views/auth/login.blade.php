@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-5">
            <div class="card">


                <div class="card-body p-5">
                    <div>
                        <h3>Admin Login</h3>
                        <p>Enter your email and password</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>



                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Login') }}
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection