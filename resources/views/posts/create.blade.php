@extends('layouts.app')
@section('title')
NexusWildSkinCare | Create Post
@endsection
@section('adminnav')
@include('partials.myadminav')
 @endsection
@section('content')
<div class="card card-default">

    <div class="card-header">
       {{ isset($post)?"Edit Post":"Create Post" }}
    </div>

    <div class="card-body">
        @include('partials.errors')
       <form action="{{ isset($post)? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
          @if(isset($post))
             @method('PUT')
          @endif
           <div class="form-group">
               <label for="title">Title</label>
               <input type="text" class="form-control" name="title" id="title" value="{{ isset($post)? $post->title:'' }}">
           </div>
           <div class="form-group">
               <label for="description">Description</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control" >{{ isset($post)? $post->description:'' }}</textarea>
           </div>
           <div class="form-group">
               <label for="content">Content</label>
               {{-- <textarea name="content" id="content" cols="5" rows="5" class="form-control">{{ isset($post)? $post->content:'' }}</textarea>  --}}
               <input id="content" type="hidden" name="content" value="{{ isset($post)? $post->content:'' }}">
               <trix-editor input="content"></trix-editor>
           </div>
           <div class="form-group">
            <label for="published_at">Published At</label>
            <input type="date" class="form-control" name="published_at" id="published_at" value="{{ isset($post)? $post->published_at:'' }}">
        </div>
        @if(isset($post))
          <div class="form-group">
              <img src="{{ asset('storage/'.$post->image) }}" alt="post image" style="width:100%;">
          </div>
        @endif
           <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control btn btn-primary" name="image" id="image">
           </div>
           <div>
            <label for="Category">Category</label>
            <select name="category" id="category" class="form-control tags-selector">
               @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if(isset($post))
                    @if($category->id == $post->category_id)
                    selected
                     @endif
                    @endif

                    >
                  {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        @if($tags->count() > 0)
        <div class="form-group">
            <label for="tags">Tags</label>
           <select name="tags[]" id = "tags" class="form-control js-example-tokenizer" multiple>
            @foreach($tags as $tag)
               <option value="{{ $tag->id }}"
                 @if(isset($post))
                 @if($post->hasTag($tag->id))
                 selected
                 @endif
                 @endif
                 >
                   {{ $tag->name }}
               </option>
            @endforeach
           </select>
        </div>
        @endif
        <div class="form-group py-4">
            <button type="submit" class="btn btn-success">{{ isset($post)?"Update Post":"Create Post" }}</button>
        </div>
       </form>
    </div>
</div>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js" integrity="sha512-+ruHlyki4CepPr07VklkX/KM5NXdD16K1xVwSva5VqOVbsotyCQVKEwdQ1tAeo3UkHCXfSMtKU/mZpKjYqkxZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
<script>

        $('.tags-selector').select2();

</script>

