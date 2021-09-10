@extends('layouts.app')
@section('title')
NexusWildSkinCare | Categories List
@endsection
@section('adminnav')
@include('partials.myadminav')
 @endsection
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fa fa-plus mr-2" aria-hidden="true"></i> Add Category</a>
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
                   <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm text-white mr-2">Edit</a>
                       <button class="btn btn-danger btn-sm " onclick="handleDelete({{ $category->id }})">Delete</button>
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
        <form action="" method="POST" id="deleteCategoryForm">
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
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('script')
<script>
  function handleDelete(id) {
      var form = document.getElementById('deleteCategoryForm');
      form.action = '/categories/'+ id;

    $('#deleteModal').modal('show');
  }
</script>
@endsection
