@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class=" pt-2 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Membership Plans
                    </h5>
                </div>
                <div class="card-body">
                    <div>
                        <h5>
                            hello '{{ $user->name }}' Choose a membership plan to countinue 
                        </h5>
                    </div>
                    @foreach ($tiers as $item)
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
        
                                    <h4 class="card-title col-9">
                                        {{ $item->name . '  '}}
                                        <span class="" style="border:solid 1px;border-radius: 50%;">
                                            {{ $item->icon }}
                                            {{-- <i class="fa fa-rocket" aria-hidden="true"></i> --}}
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
                                    <a href="{{ route('deposit',$item->id) }}" class="btn btn-primary">Sellect plan</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            
            
        </div>
    </div>
    
    
</div>

@endsection