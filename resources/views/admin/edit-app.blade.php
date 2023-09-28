@extends('layouts.front_layout')
@section('title')
    Dashboard
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5>
            Edit Product
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('app.update',$app->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" value="{{ $app->name }}" name="name" id="" aria-describedby="helpId" placeholder="">
                {{-- <small id="helpId" class="form-text text-muted">Plane name</small> --}}
            </div>
        
            <!-- <div class="form-group mb-3">
                <label for="">price</label>
                <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="">
                {{-- <small id="helpId" class="form-text text-muted">Plane Price</small> --}}
            </div> -->
        
            <div class="mb-3">
                <label for="" class="form-label">Upload img</label>
                <input type="file" class="form-control" name="image" id="" aria-describedby="fileHelpId">
                {{-- <div id="fileHelpId" class="form-text">Help text</div> --}}
            </div>
        
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="float"
                        class="form-control" name="price" value="{{$app->price}}" aria-describedby="helpId" placeholder="$50">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                </div>
        
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Profit</label>
                        <input type="float"
                        class="form-control" name="profit" value="{{ $app->profit }}" aria-describedby="helpId" placeholder="$0.5">
                        {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection