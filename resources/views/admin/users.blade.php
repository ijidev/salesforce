@extends('layouts.layout')
@section('title')
    Users
@endsection
@section('content')

 <div class="card">
    <div class="card-body">
        <table class="table table-bark table-responsive ">
            <thead class="thead-light">
                <tr>
                    <th>User Name</th>
                    <th>email</th>
                    <th>Membership</th>
                    <th>Status</th>
                    <th>Password</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tier->name }}</td>
                        <td>
                            @if ($user->is_active == true)
                                <div class="badge badge-success">Active</div>
                            @else
                              <div class="badge badge-info">In-Active</div> 
                            @endif
                        </td>
                        <td>{{ $user->pass }}</td>
                        <td>
                            <div class="dropdown">
                                <button id="my-dropdown" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                    <a class="dropdown-item active" href="{{ route('user',$user->id) }}">Manage</a>
                                    <a class="dropdown-item active" href="{{ route('delete.user',$user->id) }}">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                </tr>
            </tfoot>
        </table>
    </div>
 </div>

@endsection
