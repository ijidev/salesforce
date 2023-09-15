@extends('layouts.front-header')
@section('content')
<div class="task">
    <div>
      <h3>Optimise <br> {{ '('.$user->optimized .'/'. $user->tier->daily_optimize .')' }}</h3>
    </div>
    <form action="{{ route('start') }}">
        <button type="submit">Start Now</button>
    </form>
  </div>
  
  <div class="starting-container">
    <div class="starting-header">
      <h3>{{ $user->tier->name }}</h3>
      <h3>{{ $user->name }}</h3>
    </div>
    <div class="starting-card">
      <div>
        <h4>Total Profit</h4>
        <p>${{ $user->balance }}</p>
      </div>
      <p class="text">Profit Reset Daily</p>
    </div>
    <div class="starting-card">
      <div>
        <h4>Today's Profit</h4>
        <p>$0.00</p>
      </div>
      <p class="text">Profit Reset Daily</p>
    </div>
    <div class="starting-card">
      <div>
        <h4>Asset </h4>
        <p>$0.00</p>
      </div>
      <p class="text">Profit Reset Daily</p>
    </div>
  </div>
@endsection