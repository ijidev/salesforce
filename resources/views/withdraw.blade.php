@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('success') }}
                    </div>   
                @elseif (session('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('error') }}
                    </div>   
                    
                @endif
                <div class="card-body">
                    
                    <div class="row p-3 text-center">
                        {{-- <div class="col-4" style="border-right: solid 1px;">
                            {{ '$'.$user->balance }} <br>
                            Total Profit
                        </div> --}}

                        <div class="col-6" style="border-right: solid 1px;">
                            {{ '$'.$user->frozen }} <br>
                            frozen bal
                        </div>

                        <div class="col-6" >
                            {{ '$'.$user->asset }} <br>
                            Asset Balance
                        </div>
                    </div>

                    <form action="{{ route('request.withdraw') }}">
                        @csrf
                        <div class="form-group">
                            <label for="my-select">Choose Wallet</label>
                            <select id="my-select" class="form-control" name="wallet">
                                @foreach($wallets as $wallet)
                                <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="input-group">
                            <input class="form-control" type="number" name="amount" placeholder="Withdrawl amount..." aria-label="Withdrawl amount" aria-describedby="my-addon">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text btn btn-success" id="my-addon">Request withdrawl</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">
                    <h5 class="card-title">Withdrawal History</h5>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <td>Amount</td>
                                <td>Status</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdraw as $withdraw)
                                <tr>
                                    <td>${{ $withdraw->amount }}</td>
                                    <td>
                                        @if ($withdraw->status == 'approved')
                                            <span class="badge bg-success">
                                            {{ $withdraw->status }}
                                            </span>
                                        @elseif ($withdraw->status == 'declined')
                                            <span class="badge bg-danger">
                                            {{ $withdraw->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                            {{ $withdraw->status }}
                                            </span>
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection