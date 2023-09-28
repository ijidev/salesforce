@extends('layouts.front_layout')
@section('title')
    View Deposit
@endsection
@section('content')

<div class="card">
    <div class="card-body">
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
                {{-- <div class="badge bg-success">Approved</div> --}}
                <button href="{{ route('approve.deposit',$item->id) }}" disabled class="btn btn-info">Deposit Approved</button>
            @else
                <a href="{{ route('approve.deposit',$item->id) }}" class="btn btn-info">Approve Deposit</a>
            @endif
    </div>
</div>
@endsection