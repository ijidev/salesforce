@extends('layouts.front')

@section('title')

@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

        <div class="row mb-4">
            <div class="col-3"><a href="{{ route('record') }}">All</a></div>
            <div class="col-3"><a href="{{ route('record.pending') }}">Pending</a></div>
            <div class="col-3"><a href="{{ route('record.frozen') }}">Frozen</a></div>
            <div class="col-3"><a href="{{ route('record.completed') }}">completed</a></div>
            <hr>
        </div>

            @foreach ($records as $record)

            <div class="row">
                <div class="col-9">
                    {{ $record->created_at }}
                </div>
                <div class="col-3 text-center ">
                    @if ($record->status == 'approved')
                    <div style="
                        border:solid green 1px;
                        border-radius:10px;
                    ">
                        {{ $record->status }}
                    </div>
                    @elseif ($record->status == 'frozen')
                    <div style="
                        border:solid red 1px;
                        border-radius:10px;
                    ">
                        {{ $record->status }}
                    </div>
                    @elseif ($record->status == 'pending')
                    <div style="
                        border:solid orange 1px;
                        border-radius:10px;
                    ">
                        {{ $record->status }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset($record->product->img) }}" width="50" alt="Product-img">
                        </div>
                        <div class="col-10">
                            {{ $record->product->name }}
                        </div>
                    </div>   
                    <hr>
                    <div class="row text-center">
                        <div class="col-6">
                            <h6>Total Amount</h6>
                            ${{ $record->product->price }}
                        </div>
                        <div class="col-6">
                            <h6>Profit</h6>
                            ${{ $record->product->profit }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection