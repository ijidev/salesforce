@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

           <div class="card">

                <div class="card-header">
                    <h5>make payment to the provided details bellow</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-4">
                            <h6 class="card-title">Payment Instruction:</h6>
                        </div>
                        <div class="col-8">
                            Make payment to any of the provided Wallet bellow and upload a snapshot/proof of
                            payment 
                        </div>
                        <hr>
                        <table class="table table-dark">
                            <thead class="thead-light">
                                <tr>
                                    <th>Wallet</th>
                                    <th>Wallet Address</th>
                                </tr>
                            </thead>
                            @foreach ($payment as $active)
                            <tbody>
                                <tr>
                                    <td>{{ $active->wallet_name . ' :' }}</td>
                                    <td>{{ $active->wallet_address }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>  
                        <hr>

                        <div class="col-4">
                            <h5 class="card-title">Amount:</h5>
                        </div>
                        <div class="col-8">
                            {{ '$ '. $plan->price }}
                        </div>
                        <hr>

                    </div>

                    <form action="{{ route('confirm.deposit',$plan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="proof" class="form-label">Proof of Payment</label>
                          <input type="file" class="form-control" name="proof_image" id="proof" placeholder="" required aria-describedby="fileHelpId">
                          <div id="fileHelpId" class="form-text">Upload proof of payment here</div>
                        </div>

                        <span class="text-center">
                            <button type="submit" class="btn btn-success">i've made payment</button>
                        </span>

                    </form>

                </div>
           </div>
            
        </div>
    </div>
    
    
</div>

@endsection