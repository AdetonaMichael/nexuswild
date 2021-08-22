@extends('layouts.app')
@section('title')
NexusWildSkinCare | List Posts
@endsection
@section('adminnav')
@include('partials.myadminav')
 @endsection
@section('content')
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
            <td><img src="{{ asset('storage/'.$post->image)}}" width=60 height=60></td>
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
