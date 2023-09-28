@extends('layouts.front-header')
@section('content')
  
<!-- {{ date('H') }} -->
  <div class="task">
    <div>
      <h3>Optimise {{ '('.$user->optimized .'/'. $user->tier->daily_optimize .')' }}</h3>
    </div>
    @if ($user->optimized >= $user->tier->daily_optimize)
        <a class="btn text-white" href="{{ route('contact') }}" style="border: 1px solid white ; border-radius:10px; padding:5px;">Contact Support</a>
    @else
      <form action="{{ route('start') }}">
          <button type="submit">Start Now</button>
      </form>
        
    @endif
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
      <p class="text">Accumulated Profit</p>
    </div>
    <div class="starting-card">
      <div>
        <h4>Reset count</h4>
        <p>{{ $user->reset_count . '/' . $user->tier->reset}}</p>
      </div>
      <p class="text">Tier reset count</p>
    </div>
    <div class="starting-card">
      <div>
        <h4>Asset value</h4>
        <p>${{ $user->asset }}</p>
      </div>
      <p class="text">Accumulated Asset</p>
    </div>
  </div>
@endsection