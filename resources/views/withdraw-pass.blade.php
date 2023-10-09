@extends('layouts.front')

@section('title')

@endsection

@section('content')

<form action="{{route('withdraw')}}">
    
    <div class="mb-3">
      <label for="" class="form-label">Withdrawal Password</label>
      <input type="text"
        class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="Withdrawal Password">
      <small id="helpId" class="form-text text-muted">Enter your withdrawal password</small>
    </div>

    <button class="btn btn-success" type="submit">Submit</button>

</form>


@endsection