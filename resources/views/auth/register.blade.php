{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}

@include('layouts.header')


<body>
    <div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row">
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Dashboard</h1>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Form Panel    -->
                    <div class="col-lg-6 bg-white">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <form method="POST" action="{{ route('registe') }}">
                                    @csrf
                                    <div class="form-group-material">
                                        <input id="name" type="text" name="name" required
                                            data-msg="Please enter your username" class="input-material"
                                            value="{{ old('name') }}" required autocomplete="name">
                                        <label for="register-username" class="label-material">Username</label>
                                    </div>
                                    <div class="form-group-material">
                                        <input id="email" type="email" name="email" required
                                            data-msg="Please enter a valid email address" class="input-material"
                                             name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email" class="label-material">Email Address </label>
                                    </div>
                                    <div class="form-group-material">
                                        <input id="password" type="password" name="password" required
                                            data-msg="Please enter your password" class="input-material"
                                            value="{{ old('password') }}" required autocomplete="password">
                                        <label for="password" class="label-material">Password </label>
                                    </div>

                                    <div class="form-group-material">
                                        <input id="ref_code" type="text" name="ref_code" required
                                            data-msg="Please enter your upline ref _code" class="input-material">
                                        <label for="ref_code" class="label-material">Referal Code </label>
                                    </div>
                                    <div class="form-group terms-conditions text-center">
                                        <input id="register-agree" name="registerAgree" type="checkbox" required
                                            value="1" data-msg="Your agreement is required"
                                            class="checkbox-template">
                                        <label for="register-agree">I agree with the terms and policy</label>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">Register</button>
                                        {{-- <input id="register" type="submit" value="Register" > --}}
                                    </div>
                                </form><small>Already have an account? </small><a href="login.html"
                                    class="signup">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
