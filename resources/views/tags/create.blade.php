@extends('layouts.app')
@section('title')
NexusWildSkinCare | Create Tag
@endsection
@section('adminnav')
@include('partials.myadminav')
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