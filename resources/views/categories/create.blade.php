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
         {{ isset($category)?"Edit Category":"Create Category" }}
     </div>
     <div class="card-body">
         @include('partials.errors')
         <form action="{{ isset($category)? route('categories.update',$category->id):route('categories.store') }}" method="POST">
             @csrf
             @if(isset($category))
                @method('PUT')
             @endif
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" class="form-control" name="name"value="{{ isset($category)? $category->name:"" }}">
             </div>

             <div class="from-group">
                <button class="btn btn-success">{{ isset($category)?"Update Category":"Add Category" }}</button>
             </div>
         </form>
     </div>
 </div>
@endsection