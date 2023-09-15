@extends('layouts.front')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card">
               
                <div class="card-body text-center">
                    
                    <img src="{{ asset('assets/img/avatar-2.jpg') }}" width="100" height="100" class="img-fluid rounded-circle" alt="img">
    
                    <div class="p-2">
                        <span style="font-size: 20px; font:bold;"> 
                            {{ $user->name }}
                            <img src="{{ asset($user->tier->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                        </span>
                        <br>
                    </div>

                    <div class="p-2">
                        <span style="font-size: 20px; font:bold;">
                            User-ID:{{' '. $user->ref_id }}
                        </span> 
                    </div>

                    <div class="form-group">
                        <span style="font-size: 20px; font:bold;">
                            <label for="my-input">Credit Score:</label>
                        </span> 
                        <input id="my-input" class="form-control-range" type="range" value="{{ $user->credit_score }}" disabled min="0" max="100"> {{ $user->credit_score }}
                    </div>

                    <div class="row p-3">
                        <div class="col-4" style="border-right: solid 1px;">
                            {{ '$'.$user->balance }} <br>
                            Total Profit
                        </div>

                        <div class="col-4" style="border-right: solid 1px;">
                            {{ '$'.$user->frozen }} <br>
                            frozen bal
                        </div>

                        <div class="col-4" >
                            {{ '$'.$user->asset }} <br>
                            Asset Value
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">My Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('membership') }}" class="btn">Membership</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('edit') }}" class="btn">Edit Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('info') }}" class="btn">Payment info</a>
                        </li>
                    </ul>
                </div>
                
                <div class="card-header">
                    <h5 class="card-title">Finance</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('withdraw') }}" class="btn">Withdrawal & History</a>
                        </li>
                        {{-- <li class="list-group-item">
                            <a href="{{ route('history') }}" class="btn">History</a>
                        </li> --}}
                    </ul>
                </div>

                <div class="card-header">
                    <h5 class="card-title">About Us</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('contact') }}" class="btn">Contact us</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('notify') }}" class="btn">Notification</a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>


@endsection