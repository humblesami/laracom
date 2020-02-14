@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" class="colorlib-form" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
@csrf
<h2>Login</h2>
<div class="row">
    <div class="form-group">
            <div class="col-md-6">
                <label for="fname">Email</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-6">
                <label for="lname">Password</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a> -->
            </div>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
