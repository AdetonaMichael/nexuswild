@extends('layouts.app')
@section('title')
NexusWildSkinCare | Tags
@endsection
@section('adminnav')
@include('partials.myadminav')
@endsection
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success">Add tag</a>
</div>
<div class="card card-default">
    <div class="card-header">
        tags
    </div>
    <div class="table-body">
      @if($tags->count() >0)
      <table class="table">
        <thead>
            <th>Name</th>
            <th>Posts Count</th>
        </thead>
        <tbody>
             @foreach($tags as $tag)
               <tr>
                   <td>
                       {{ $tag->name }}
                   </td>
                   <td>
                     {{ $tag->posts->count() }}
                   </td>
                   <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-sm text-white">Edit</a>
                       <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">Delete</button>
                </td>
                   
               </tr>
             @endforeach
        </tbody>
    </table>
      @else
      <h3 class="text-center">No tags Yet</h3>
      @endif
       
        <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="deletetagForm">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <p class="text-center text-bold">Are you Sure You want to Delete This tag ?</p>
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
      
      var form = document.getElementById('deletetagForm')
      form.action = '/tags/'+ id
      console.log('deleted', form);
      $('#deleteModal').modal('show')
  }  
</script>
@endsection
