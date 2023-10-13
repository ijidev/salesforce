@extends('layouts.front_layout')
@section('title')
    Product overview
@endsection

@section('content')

<form action="{{ route('review.approve',$product->id) }}">
    <div class="card text-center pt-3 pb-3">
        <div class="text-center">
            <img src="{{ asset($product->product->img) }}" width="100" class="rounded-circle" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->product->name}} </h5>
            <hr>

            <div class="table-responsive">
                <table class="table">
                    <tr class="card-subtitle mb-2 text-muted">
                        <td>Rating</td>
                        <td>Comment</td>
                    </tr>
    
                    <tr class="">
                        <td>
                            <h6 >{{$product->rating}}</h6>
                        </td>
                        
                        <td>
                            <p class="card-text">{{ $product->comment }} </p>
                        </td>
                    </tr>
                </table>
            </div>
            <hr>
            


            <div class="form-group mb-3">
                <label for="" class="form-label">Status {{ '('. $product->status .')' }}</label>
                <select class="form-select form-control form-select-lg" name="status" id="">
                    <option selected>Select one</option>
                    <option value="approved">Approve</option>
                    <option value="pending">Pending</option>
                    <option value="frozon">Frozen</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </div>
</form>

@endsection