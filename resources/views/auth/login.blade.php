{{-- @extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header row justify-content-center">
                    <div class="col-6">
                        <a href="" class="btn btn-primary">login</a>
                    </div>
                    <div class="col-6">
                        <a href="" class="btn btn-primary">register</a>
                    </div>
                </div>
            </div>
            <div class="card">

                <div class="card-header">{{ __('Login') }}
                
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@include('layouts.header')

<body> 
    <div class="login-page log">
        <div class="container d-flex align-items-center">
            <div class="form-holder has-shadow">
                <div class="row justify-content-center">
                    <div class="col-12 text-center mb-4">
                        <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" alt="">
                    </div>
                    <!-- Logo & Information Panel-->
                    <div class="col-lg-6">
                        <div class="info d-flex align-items-center">
                            <div class="content">
                                <div class="logo">
                                    <h1>Welcome Back</h1>
                                </div>
                                <p>Login To your account to access our premuim features</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panel    -->
                    <div class="col-lg-6">
                        <div class="form d-flex align-items-center">

                            <div class="content text-white">
                                

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="email" class="col-4 text-white col-form-label text-md-end">{{ __('Email') }}</label>
            
                                        <div class="col-8">
                                            <input id="email" type="email" placeholder="Enter Email here..." class="form-control text-white @error('email:') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-4 col-form-label text-white text-md-end">{{ __('Password:') }}</label>
            
                                        <div class="col-8">
                                            <input id="password" type="password" placeholder="Password here.." class="text-white form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    {{-- <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>--}}
            
                                    <div class="row justify-content-center text-center mb-0">
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }} <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="col-7 ">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
            
                                    </div> 
                                </form>

                                {{-- <a href="{{ route('password.request') }}" class="forgot-pass"> Forgot Password? </a> --}}
                                <div class="text-center">
                                    <br>
                                    <small>Do not have an account? </small>
                                    <a href="{{ route('register') }}" class="signup">Signup</a>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@include('layouts.footer')
