@extends('layouts.front')

@section('title')

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img src="{{ asset($product->img) }}" class="rounded-circle" height="50" width="50" alt="product img"> 
                
                <h4>
                    {{ $product->name }}
                </h4>
                <div class="row">
                    <div class="col-6">
                        Total amount
                        <h6>
                            ${{ $product->price }}
                        </h6>
                    </div>
                    <div class="col-6">
                        Profit
                        <h6>
                            ${{ $product->profit }}
                        </h6>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">

                    <form action="{{ route('submit.review',$product->id) }}">
                        <div class="form-group mb-3">
                            <label for="rating">Review Option</label>
                            <select class="form-control" name="rating">
                                <option value="5">***** Excellent</option>
                                <option value="4">**** Amazing</option>
                                <option value="3">*** Not bad</option>
                                <option value="2">** Can't Say</option>
                                <option value="1">* Bad</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" id=""  cols="10" class="form-control" placeholder="comment"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

