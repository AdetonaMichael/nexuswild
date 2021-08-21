@extends('layouts.app')
@section('adminnav')
<div class="col-md-2">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('posts.index') }}">Post</a>
        </li>
          @if(auth()->user()->isAdmin())
          <li class="list-group-item">
             <a href="{{ route('users.index') }}">Users</a>
         </li>
          @endif
        <li class="list-group-item">
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('tags.index') }}">Tags</a>
        </li>
    </ul>
    <ul class="list-group mt-5">
        <li class="list-group-item">
            <a href="{{ route('trashed-posts.index') }}">Trashed Post</a>
        </li>
    </ul>
    <ul class="list-group mt-5">
        <li class="list-group-item">
            <a href="/">Home</a>
        </li>
    </ul>
    <ul class="list-group mt-5">
        <li class="list-group-item">
            <a href="/home">Blog</a>
        </li>
    </ul>
 </div>
 @endsection
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
