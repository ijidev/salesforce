@extends('layouts.front')

@section('title')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class=" pt-2 col-md-6">
            <div class="card">
                <div class="card-header text-white">
                    <h5>
                        Membership Plans
                    </h5> <hr>
                    <p>
                        hello '{{ $user->name }}' Choose a membership plan to countinue 
                    </p>
                </div>
            </div>
            @foreach ($tiers as $item)
                @if ($user->tier == $item)
                <div class="card mt-3 text-white">
                    <div class="card-header">
                        <div class="row">

                            <h4 class="card-title col-8">
                                {{ $item->name}}
                                <img src="{{ asset($item->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                                
                            </h4>

                            <h5 class="col-4">
                                {{ '$ '. $item->price }} <br>
                                <span class="badge bg-prymary">Current Tire</span>

                            </h5>

                        </div>
                    </div>
                    
                    <div class="card-body">
                        <p class="card-text text-center">{{ $item->description }}</p>
                    
                        <div class=" text-center">
                            {{-- <a href="{{ route('deposit',$item->id) }}" class="btn btn-primary" disabled>Select plan</a> --}}
                        </div>
                    </div>
                </div>
                @else
                    <div class="card mt-3 text-white">
                        <div class="card-header">
                            <div class="row">

                                <h4 class="card-title col-8">
                                    {{ $item->name}}
                                    <img src="{{ asset($item->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                                    
                                </h4>

                                <h5 class="col-4">
                                    {{ '$ '. $item->price }}

                                </h5>

                            </div>
                        </div>
                        
                        <div class="card-body">
                            <p class="card-text text-center">{{ $item->description }}</p>
                        
                            <div class=" text-center">
                                <a href="{{ route('deposit',$item->id) }}" class="btn btn-primary">Select plan</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            </div>
            
            
        </div>
    </div>
    
    
</div>

@endsection