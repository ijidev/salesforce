@extends('layouts.front_layout')
@section('title')
    Deposit Records
@endsection
@section('content')

 <div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">User Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deposits as $item)
                <tr class="">
                    <td scope="row">{{ $item->user->name }}</td>
                    <td>{{ '$ '. $item->amount }}</td>
                    <td>
                        @if ($item->is_approved == true)
                            <div class="badge bg-success">Approved</div>
                        @else
                            <div class="badge bg-info">Pending</div>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('view.deposit',$item->id ) }}">View <i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>
 

@endsection
