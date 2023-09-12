@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                
                <div class="card-header">{{ __('Wellcone Back!') }}</div>    
                @if (session('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('success') }}
                    </div>   
                @elseif (session('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
               
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('assets/img/avatar-2.jpg') }}" width="100" height="100" class="img-fluid rounded-circle" alt="img">
                        </div>

                        <div class="col-8 text-left">
                            <div class="p-2">
                                <span style="font-size: 20px; font:bold;"> 
                                    {{ $user->name }}
                                </span>
                                <br>
                            </div>
        
                            <div class="p-2">
                                <span style="font-size: 20px; font:bold;">
                                    Membership:{{' '. $user->tier->name }}
                                    <img src="{{ asset($user->tier->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                                </span> 
                            </div>

                            <div class="p-2">
                                <span style="font-size: 20px; font:bold;">
                                    User-ID:{{' '. $user->ref_id }}
                                </span> 
                            </div>

                        </div>
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
            
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-8">
                            <span style="font-size: 20px; font:bold;">
                                Optimize
                            </span> ({{ $user->optimized .'/'. $user->tier->daily_optimize }})
                        </div>
    
                        <div class="col-4">
                            <a href="{{ route('start') }}" class="btn btn-primary">Optimize</a>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <img src="{{ asset('uploads/proof/'.$d->proof) }}" alt=""> --}}
            
            
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-10 card-title">
                    <h4>Membership Plans</h4>
                </div>
                <div class="col-2">
                    <a href="{{ route('membership') }}" class="btn btn-outline-primary">All >></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row p-3">
                @foreach ($tiers as $item)

                    @if ($item->id == $user->tier->id)

                        {{-- @dd(true) --}}
                        <div class="col-3">
                            <span class="p-3" style="
                                border:solid 1px;
                                border-radius: 10%;
                                border-color:blueviolet;
                                ">
                                <img src="{{ asset($item->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                                
                                {{-- <i class="fa fa-rocket" aria-hidden="true"></i> --}}
                            </span>
                        </div>
                    @else
                        <div class="col-3">
                            <span class="p-3" style="
                                border:solid 1px;
                                border-radius: 50%;
                                ">
                                {{ $item->icon }}
                                {{-- <i class="fa fa-rocket" aria-hidden="true"></i> --}}
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr>
            <p class="card-text">{{ $user->tier->description }}</p>
        </div>
    </div>
    

        {{-- <div class="row">
            <div class="col-3">
                <span class="p-3  bg-light" style="
                    border:1px;
                    border-radius: 50%;
                    ">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                </span> <br>
                Check-in
            </div>
        
            <div class="col-3">
                <span class="p-3 bg-light" style="
                    border:1px;
                    border-radius: 50%;
                    ">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                </span>
                <br>
                Check-in
            </div>
        
            <div class="col-3">
                <span class="p-3 bg-light" style="
                    border:1px;
                    border-radius: 50%;
                    ">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                </span>
                <br>
                Check-in
            </div>
        
            <div class="col-3">
                <span class="p-3 bg-light" style="
                    border:1px;
                    border-radius: 50%;
                    ">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                </span>
                <br>
                Check-in
            </div>
        
        </div>
     --}}
    
</div>


  
@endsection

