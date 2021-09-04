@extends('layouts.app')
@section('title')
NexusWildSkinCare | List Posts
@endsection
@section('adminnav')
@include('partials.myadminav')
 @endsection
@section('content')
@section('css')
<style>
.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
  </style>
@endsection
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fas fa-layer-group   fa-2x "></i>
        <span class="count-numbers">{{ $categories_count->count() }}</span>
        <span class="count-name">Categories</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
       <i class="fa fa-tag fa-2x" aria-hidden="true"></i>
        <span class="count-numbers">{{ $tag_count->count() }}</span>
        <span class="count-name">Tags</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database fa-2x"></i>
        <span class="count-numbers">{{ $posts->count() }}</span>
        <span class="count-name">Posted</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users fa-2x"></i>
        <span class="count-numbers">{{ $users->count() }}</span>
        <span class="count-name">Users</span>
      </div>
    </div>
  </div>
</div>

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success"><i class="fa fa-plus mr-2" aria-hidden="true"></i> Add Post</a>
</div>

<div class="card card-default">
  <div class="card-header">
      Posts
  </div>
  <div class="card-body">
    @if($posts->count()>0)
    <table class="table table-striped">
      <thead>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td><img src="{{ asset('../storage/'.$post->image) }}" width=60 height=60></td>
            <td><p>{{ $post->title }}</p></td>
            <td><a href="{{ route('categories.edit', $post->category->id) }}">{{ $post->category->name }}</td>
            @if(!$post->trashed())
            <td>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
            </td>
            @else

              <td>
            <form action="{{ route('restore-posts', $post->id) }}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="btn btn-info btn-sm text-white">Restore</button>

            </form>
            </td>
              @endif

            <td>
              <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm">
                  {{ $post->trashed() ? 'Delete':'Trash' }}<i class="fab fa-trash" aria-hidden="true"></i></button>

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <h3 class="text-center">No Post At this Moment</h3>
    @endif

  </div>
</div>
@endsection
