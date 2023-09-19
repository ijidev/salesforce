@extends('layouts.layout')

@section('title')
    Update Faq
@endsection

@section('content')
   <div class="card">
    <div class="card-body">
        
        <form action="{{ route('update.faq', $faq->id) }}">

            <div class="mb-3">
              <label for="" class="form-label">Question</label>
              <input type="text"
                class="form-control text-white" name="question" value="{{ $faq->question }}" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">FAQ Question</small>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Answer</label>
              <textarea class="form-control text-white" name="ans" id="" rows="3">{{ $faq->answer }}</textarea>
            </div>

            <button type="submit">Update</button>

        </form>
    </div>
</div> 
@endsection

