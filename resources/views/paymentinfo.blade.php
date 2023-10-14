@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title">My Details</h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <td>Wallet</td>
                                <td>Address</td>
                                <td>Delete</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infos as $info)
                                <tr>
                                    <th>{{ $info->wallet . ' :' }} </th>
                                    <th>{{ $info->address }}</th>
                                    <th><a href="{{ route('info.remove',$info->id) }}" class="btn btn-danger">X</a></th>
                                    <th><a href="{{ route('info.edit',$info->id) }}" class="btn bg-light">Edit</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="card mt-3">
                <div class="card-body ">
                    <form action="{{ route('info.add') }}">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Wallet</label>
                          <input type="text"
                            class="form-control" name="wallet" id="" aria-describedby="helpId" placeholder="BTC, ETH, USDT">
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Address</label>
                          <input type="text"
                            class="form-control" name="address" id="" aria-describedby="helpId" placeholder="Wallet Address">
                        </div>

                        <button class="btn btn-success" type="submit">Add</button>
                    </form>
                </div>
            </div>


        </div>
    </div> 
</div>

@endsection