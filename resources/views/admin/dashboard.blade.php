@extends('layouts.front_layout')
@section('title')
    Dashboard
@endsection

@section('content')

 <div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Total Users:</h4>
                <h5>{{ $user->count() }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Active Users:</h4>
                <h5>{{ $active }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>Inactive Users:</h4>
                <h5>{{ $inactive }}</h5>
            </div>
        </div>
    </div>
 </div>

 <div class="card">
    <div class="card-header">
        <h5 class="card-title">Pending Deposit Request</h5>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover table-inverse">
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
                    <tr class="text-white">
                        <td scope="row">{{ $item->user->name }}</td>
                        <td>{{ '$ '. $item->amount }}</td>
                        <td class="">
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
 </div>

@endsection

{{-- <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Payment Proof</h5>
                <img src="{{ asset('uploads/proof/'. $item->proof) }}" width="400" alt="PaymentProof">
                <div class="row">
                    
                    <div class="col-4">
                        <h5>
                            User Name:
                        </h5>
                    </div>
                    <div class="col-8">
                        <h6>
                            {{ $item->user->name }}
                        </h6>
                    </div>

                    <div class="col-4">
                        <h5>
                            Amount:
                        </h5>
                    </div>
                    <div class="col-8">
                        <h6>
                            ${{ $item->amount }}
                        </h6>
                    </div>

                    <div class="col-4">
                        <h5>
                            Status:
                        </h5>
                    </div>
                    <div class="col-8 text-white">
                        <h6>
                            @if ($item->is_approved == true)
                                <div class="badge bg-success">Approved</div>
                            @else
                                <div class="badge bg-info">Pending</div>
                            @endif
                        </h6>
                    </div>
                </div>
                    @if ($item->is_approved == true)
                        <div class="badge bg-success">Approved</div>
                        <button href="{{ route('approve.deposit',$item->id) }}" disabled class="btn btn-info">Deposit Approved</button>
                    @else
                        <a href="{{ route('approve.deposit',$item->id) }}" class="btn btn-info">Approve Deposit</a>
                    @endif
            </div>
        </div>
    </div>
</div> --}}