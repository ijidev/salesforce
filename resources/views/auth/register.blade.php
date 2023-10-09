{{-- @extends('layouts.app') --}}
@include('layouts.header')
{{-- @section('content') --}}
<div class="login-page">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row justify-content-center">
                    <!-- Logo & Information Panel-->
                    <div class="col-12 text-center mb-4">
                        <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" width="200" alt="">
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Join Us</h1>
                                </div>
                                <p>Create an account today and explore our premuim features</p>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Form Panel    -->
                    <div class="col-lg-6">
                        <div class="form d-flex align-items-center">
                            <div class="content">
                                <h5 class="mb-4 text-center text-white">REGISTER</h5>
                                <hr>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="name" class="col-4 col-form-label text-white text-md-end">{{ __('Name') }}</label>
            
                                        <div class="col-8">
                                            <input id="name" type="text" placeholder="Your FullName ...." class="form-control text-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-4 col-form-label text-white text-md-end">{{ __('Email Address') }}</label>
                                        <div class="col-8">
                                            <input id="email" type="email" placeholder="Email address..." class=" form-control text-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-4 col-form-label  text-white text-md-end">{{ __('Password') }}</label>
            
                                        <div class="col-8">
                                            <input id="password" type="password" placeholder="Password..." class="form-control text-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-4 col-form-label text-white text-md-end">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-8">
                                            <input id="password-confirm" type="password" placeholder="Re-enter Password..." class="form-control text-white" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="withdrawal-password" class="col-4 col-form-label text-white text-md-end">{{ __('Withdrawal Password') }}</label>
            
                                        <div class="col-8">
                                            <input id="withdrawal-password" type="password" placeholder="Password for withdrawal..." class="form-control text-white" name="withdrawal_password" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        
                                        <label for="ref_code" class="col-4 text-white col-form-label text-md-end">{{ __('Refferal code') }}</label>
                                        <div class="col-8">
                                            <input id="ref_code" type="text" placeholder="Referal Code..." class="form-control  text-white @error('ref_code') is-invalid @enderror" name="ref_code" value="{{ old('ref_code') }}">
                                            @error('ref_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group terms-conditions text-center">
                                        <input id="register-agree" name="registerAgree" type="checkbox" required
                                            value="1" data-msg="Your agreement is required"
                                            class="checkbox-template">
                                        <label for="register-agree">I agree with the terms and policy </label>
                                    </div>
                                    
                                    <div class="row mb-0 text-center">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    
                                </form>
                                <div class="text-center">
                                    <br>
                                    <small>Already have an account? </small>
                                    <a href="{{ route('login') }}" class="signup">SignIn <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                                </div>

                                {{-- <form method="POST" action="{{ route('registe') }}">
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
                                    </div>
                                </form><small>Already have an account? </small><a href="login.html"
                                    class="signup">Login</a> --}}
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- <div class="container">
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
</div> --}}
{{-- @endsection --}}
@include('layouts.footer')

{{-- 
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
                            <div class="conten">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
            
                                        <div class="col-md-8">
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
                                    </div>
                                </form><small>Already have an account? </small><a href="login.html"
                                    class="signup">Login</a>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@include('layouts.footer') --}}
