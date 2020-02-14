@extends('layouts.app')

@section('content')

<div class="container">
<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" class="colorlib-form">
    @csrf
    <div class="row">
    <div class="col-md-4">
            <div class="form-group">
                <label for="firstName">First Name</label>
                    <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required>

                    @if ($errors->has('firstName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('firstName') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="lastName">Last Name</label>
                    <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required>

                    @if ($errors->has('lastName'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lastName') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">Address1</label>
                    <input id="address1" type="text" class="form-control{{ $errors->has('address1') ? ' is-invalid' : '' }}" name="address1" value="{{ old('address1') }}" required>

                    @if ($errors->has('address1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address1') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="address2">Address2</label>
                    <input id="address2" type="text" class="form-control{{ $errors->has('address2') ? ' is-invalid' : '' }}" name="address2" value="{{ old('address2') }}" required>

                    @if ($errors->has('address2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address2') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">Phone</label>
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
    </div>
    </form>
</div>
@endsection
