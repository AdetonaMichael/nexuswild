@extends('layouts.app')
@section('content')

<div class="card card-default">
  <div class="card-header">
    <i class="fa fa-user" aria-hidden="true"></i> Users
  </div>
  <div class="card-body">
    @if($users->count()>0)
    <table class="table">
      <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            {{-- <td><img src="{{ asset('storage/'.$post->image)}}" width=60 height=60></td> --}}
            <td><i class="fa fa-user" aria-hidden="true"></i></td>
            <td><p>{{ $user->name }}</p></td>
            <td>{{ $user->email }}</td>
             <td>{{ $user->role }}</td>
             <td>
                 @if(!$user->isAdmin())
                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                
                </form>
                 @endif
                </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Users Yet</h3>
    @endif
  
  </div>
</div>
@endsection
