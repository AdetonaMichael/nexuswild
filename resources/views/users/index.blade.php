@extends('layouts.app')
@section('title')
NexusWildSkinCare |Profile Home
@endsection
@section('adminnav')
 @include('partials.myadminav')
 @endsection
@section('content')
<div class="card card-default">
  <div class="card-header">
    <i class="fa fa-user fa-2x" aria-hidden="true"></i> USERS
  </div>
  <div class="card-body">
    @if($users->count()>0)
    <table class="table table-striped table-default">
      <thead>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            {{-- <td><img src="{{ asset('public/'.$post->image)}}" width=60 height=60></td> --}}
            <td><img src="{{ Gravatar::src($user->email) }}" alt="User Gravater"></td>
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
