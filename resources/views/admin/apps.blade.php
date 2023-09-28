@extends('layouts.front_layout')
@section('title')
    Apps
@endsection

@section('content')
<button class="btn btn-info mb-3" type="button" data-toggle="modal" data-target="#my-modal">Add New</button>


    <div class="card">
        <div class="card-header">
            Products
        </div>
        <div class="card-body">

        <div class="table-responsive">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Profit</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apps as $item)
                        <tr class="">
                            <td><img src="{{ asset($item->img) }}" width="30" alt="img"></td>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ '$ '. $item->price }}</td>
                            <td>{{ '$ '. $item->profit }}</td>
                            
                            <td>
                                <a class="btn btn-info" href="{{ route('app.edit',$item->id ) }}">Edit <i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{ route('app.delete',$item->id ) }}">Delete <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection


<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{ route('app.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                      {{-- <small id="helpId" class="form-text text-muted">Plane name</small> --}}
                    </div>

                    <!-- <div class="form-group mb-3">
                      <label for="">price</label>
                      <input type="number" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="">
                      {{-- <small id="helpId" class="form-text text-muted">Plane Price</small> --}}
                    </div> -->

                    <div class="mb-3">
                        <label for="" class="form-label">Upload img</label>
                        <input type="file" class="form-control" name="image" id="" required aria-describedby="fileHelpId">
                        {{-- <div id="fileHelpId" class="form-text">Help text</div> --}}
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                              <label for="" class="form-label">Price</label>
                              <input type="float"
                                class="form-control" name="price" id="" aria-describedby="helpId" placeholder="$50">
                              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                              <label for="" class="form-label">Profit</label>
                              <input type="float"
                                class="form-control" name="profit" aria-describedby="helpId" placeholder="$0.5">
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