@extends('layouts.front_layout')
@section('title')
Membership Plans
@endsection
@section('content')
{{-- <button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#my-modal">Add New</button> --}}
{{-- <a href="{{ route('add.plan') }}" class="btn btn-info">Add New</a> --}}
@foreach ($plans as $plan)
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h5 
                        class="card-title">{{ $plan->name }}
                        <img src="{{ asset($plan->icon) }}" width="50" class="img-fluid rounded-circle" alt="icon"> 
                    </h5>
                </div>

                <div class="col-4 text-right">
                    <a href="{{ route('edit.plan', $plan->id) }}" class="btn btn-light">Edit</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">${{ $plan->price }}</h5>
            <ul class="card-text">
                @if ($plan->name == 'Normal')
                    {{ $plan->name }} users are asigned genral usage access to data collection
                    <li>Applicable to most data collection situations of light to medium level of usage involving the APPs </li>
                    <li>Profits of {{ $plan->percent }}% per APP - {{ $plan->daily_optimize }} apps per set.</li>
                    <li>No Access to other premium features</li>
                @else
                    {{ $plan->name }} users are asigned genral usage access to data collection
                    <li>Applicable to most data collection situations of light to medium level of usage involving the APPs </li>
                    <li>Profits of {{ $plan->percent }}% per APP - {{ $plan->daily_optimize }} apps per set.</li>
                    <li>Access to other premium features</li>
                @endif
            </ul>
        </div>
    </div>
 @endforeach

@endsection

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('add.plan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                      {{-- <small id="helpId" class="form-text text-muted">Plane name</small> --}}
                    </div>

                    <div class="form-group mb-3">
                      <label for="">price</label>
                      <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="">
                      {{-- <small id="helpId" class="form-text text-muted">Plane Price</small> --}}
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Upload icon</label>
                        <input type="file" class="form-control" name="icon" id="" required aria-describedby="fileHelpId">
                        {{-- <div id="fileHelpId" class="form-text">Help text</div> --}}
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="" class="form-label">Optimize Percent</label>
                              <input type="float"
                                class="form-control" name="percent" id="" aria-describedby="helpId" placeholder="0.5%">
                              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                              <label for="" class="form-label">Optimize daily limit</label>
                              <input type="number"
                                class="form-control" name="optimize" value=30 aria-describedby="helpId" placeholder="30">
                              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
