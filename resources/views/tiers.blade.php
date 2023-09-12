@extends('layouts.front')

@section('title')
<h5>
    Membership Plans
</h5>
<p>
    hello '{{ $user->name }}' Choose a membership plan to countinue 
</p>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class=" pt-2 col-md-6">
            
            @foreach ($tiers as $item)
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">

                            <h4 class="card-title col-9">
                                {{ $item->name}}
                                <img src="{{ asset($item->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon">
                                <span class="" style="border:solid 1px;border-radius: 50%;">
                                </span>
                            </h4>

                            <h5 class="col-3">
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
            @endforeach

            </div>
            
            
        </div>
    </div>
    
    
</div>

@endsection