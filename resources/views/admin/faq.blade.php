@extends('layouts.layout')
@section('title')
    FAQ
@endsection

@section('content')

    <div class="card">
        @foreach ($faqs as $faq)
        <div class="card-header">
            <h5 class="card-title">{{ $faq->question }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $faq->answer }}</p>
        </div>
        @endforeach
    </div>
@endsection