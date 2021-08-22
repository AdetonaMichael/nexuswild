<div class="col-md-2 myadminav">
    <ul class="list-group">
        <a href="{{ route('posts.index') }}"><li class="list-group-item">Post</li></a>
          @if(auth()->user()->isAdmin())
        <a href="{{ route('users.index') }}"><li class="list-group-item"><i class="fa fa-user mr-2" aria-hidden="true"></i> Users</li></a>
          @endif
        <a href="{{ route('categories.index') }}"><li class="list-group-item"><i class="fas fa-layer-group mr-2"></i> Categories</li></a>
        <a href="{{ route('tags.index') }}"><li class="list-group-item"><i class="fa fa-tags mr-2" aria-hidden="true"></i> Tags</li></a>    
    </ul>
    <ul class="list-group mt-5">
            <a href="{{ route('trashed-posts.index') }}"><li class="list-group-item"><i class="fa fa-recycle mr-2" aria-hidden="true"></i> Trashed Post</li></a>
    </ul>
    <ul class="list-group mt-5">
            <a href="/"><li class="list-group-item"><i class="fa fa-home mr-2" aria-hidden="true"></i> Home</li></a>
    </ul>
    <ul class="list-group mt-5">
            <a href="/home"><li class="list-group-item"><i class="fas fa-blog mr-2"></i> Blog</li></a>
    </ul>
 </div>