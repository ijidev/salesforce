@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card text-white">
                    @foreach ($notification as $notify)
                        <div class="card-header">
                           <img src="{{ asset('frontassets/images/notify.png') }}" width="30" alt="notification"> <h5 class="card-title">{{ $notify->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $notify->massage }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection