@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <h5>Edit Account Info</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('user.update',$user->id) }}">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text"
                        class="form-control" name="name" id="" aria-describedby="helpId" value="{{ $user->name }}">
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email"
                        class="form-control" name="email" id="" aria-describedby="helpId" value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="" aria-describedby="helpId" placeholder="password">
                    </div>

                    <button class="btn btn-success" type="submit">Update</button>
                </form>
            </div>
        </div>

        </div>
    </div>
</div>

@endsection