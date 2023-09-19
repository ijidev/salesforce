@extends('layouts.layout')
@section('title')
    Edit membership plan
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <h5>{{ $plan->name }} </h5> 
            <img src="{{ asset($plan->icon) }}" width="25" alt="icon">
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('store.plan',$plan->id) }}">
            @csrf

            <div class="form-group mb-3">
                <label for="">price</label>
                <div class="input-group">
                    <div class="input-group-append">
                        <span class="input-group-text bg-light text-dark" id="my-addon">$</span>
                    </div>
                    <input type="number" class="form-control text-white" name="price" id="" aria-describedby="helpId" value="{{ $plan->price }}">
                </div>
              {{-- <small id="helpId" class="form-text text-muted">Plane Price</small> --}}
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                      <label for="" class="form-label">Optimize Percent</label>
                          <div class="input-group-append">
                              <input type="number"class="form-control text-white" name="percent" id="" aria-describedby="helpId" value="{{ $plan->percent }}">
                              <span class="input-group-text bg-light text-dark" id="my-addon">%</span>
                          </div>
                      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Optimize daily limit</label>
                        <div class="input-group-append">
                            <input type="number"class="form-control text-white" name="optimize" value="{{ $plan->daily_optimize }}" aria-describedby="helpId" placeholder="30">
                        <span class="input-group-text bg-light text-dark" id="my-addon">%</span>
                    </div>
                      {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection