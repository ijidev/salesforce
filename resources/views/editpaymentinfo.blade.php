@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card mt-3">
                <div class="card-body ">
                    <form action="{{ route('info.store',$info->id) }}">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Wallet</label>
                          <input type="text"
                            class="form-control" name="wallet" value="{{ $info->wallet }}" aria-describedby="helpId" placeholder="BTC, ETH, USDT">
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Address</label>
                          <input type="text"
                            class="form-control" name="address" value="{{ $info->address }}" aria-describedby="helpId" placeholder="Wallet Address">
                        </div>

                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>


        </div>
    </div> 
</div>

@endsection