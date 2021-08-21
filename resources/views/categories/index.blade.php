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
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="table-body">
      @if($categories->count() >0)
      <table class="table">
        <thead>
            <th>Name</th>
            <th>Posts Count</th>
        </thead>
        <tbody>
             @foreach($categories as $category)
               <tr>
                   <td>
                       {{ $category->name }}
                   </td>
                   <td>
                     {{ $category->posts->count() }}
                   </td>
                   <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                       <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                </td>
                   
               </tr>
             @endforeach
        </tbody>
    </table>
      @else
      <h3 class="text-center">No Categories Yet</h3>
      @endif
       
        <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold">Are you Sure You want to Delete This Category ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
              </div>
        </form>
    </div>
  </div>
    </div>
</div>
@endsection
@section('script')
<script>
  function handleDelete(id){
      
      var form = document.getElementById('deleteCategoryForm')
      form.action = '/categories/'+ id
      console.log('deleted', form);
      $('#deleteModal').modal('show')
  }  
</script>
@endsection
