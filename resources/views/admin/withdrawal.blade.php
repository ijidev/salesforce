@extends('layouts.layout')
@section('title')
    Withdrawal Records
@endsection
@section('content')

 <div class="card">
    <div class="card-body">
        <table class="table table-responsive table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>UserName</th>
                    <th>wallet</th>
                    <th>address</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdraws as $item)
                    <tr>
                        {{-- {{ dd($item->wallet) }} --}}
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->wallet->wallet }}</td>
                        <td>{{ $item->wallet->address }}</td>
                        <td>${{ $item->amount }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class="dropdown">
                                <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Text</button>
                                <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                    <a class="dropdown-item active" href="{{ route('approve', $item->id) }}">Approve</a>
                                    <a class="dropdown-item active" href="{{ route('decline',$item->id) }}">Decline</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>

@endsection
