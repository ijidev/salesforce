@extends('layouts.front_layout')
@section('title')
    Review 
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
                        <th scope="col">User</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Profit</th>
                        <th scope="col">Status</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($products as $item)
                        <tr class="">
                            <td><img src="{{ asset($item->product->img) }}" width="30" alt="img"></td>
                            <td scope="row">{{ $item->product->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ '$ '. $item->product->price }}</td>
                            <td>{{ '$ '. $item->product->profit }}</td>
                            <td>
                                <div class="badge bg-orange text-white">
                                    {{ $item->status }}
                                </div>
                            </td>
                            
                            <td>
                                <a class="btn btn-info" href="{{ route('review.edit',$item->id ) }}">View <i class="fa fa-eye" aria-hidden="true"></i></a>
                                {{-- <a class="btn btn-danger" href="{{ route('review.approve',$item->id ) }}">Approve <i class="fa fa-trash"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection