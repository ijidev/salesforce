@extends('layouts.front')

@section('content')
<div class="text-center">
  <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" alt="">
</div>

   <div class="card">
    <div class="card-body text-center text-white">
      <h5 class="card-title">Support</h5>
      <p class="card-text">For inquiries, complaint or support mail us on:</p>
      {{-- <br> --}}
      <strong>Support@salesforcereviews.info</strong>
    </div>
   </div>
@endsection