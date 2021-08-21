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
         {{ isset($tag)?"Edit tag":"Create tag" }}
     </div>
     <div class="card-body">
        @include('partials.errors')
         <form action="{{ isset($tag)? route('tags.update',$tag->id):route('tags.store') }}" method="POST">
             @csrf
             @if(isset($tag))
                @method('PUT')
             @endif
             <div class="form-group">
                 <label for="name">Name</label>
                 <input type="text" id="name" class="form-control" name="name"value="{{ isset($tag)? $tag->name:"" }}">
             </div>

             <div class="from-group">
                <button class="btn btn-success">{{ isset($tag)?"Update tag":"Add tag" }}</button>
             </div>
         </form>
     </div>
 </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src={{ asset('js/scripts.js') }}></script>
 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection