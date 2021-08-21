@extends('layouts.bloghome')
@section('nav')
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
						<li class="nav-item"><a class="nav-link" href="/home">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                    </ul>
								<ul class="navbar-nav ">
				<!-- Authentication Links -->
				@guest
					@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						{{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
						</a> --}}
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
							{{ Auth::user()->name }}
						  </button>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('users.edit-profile') }}">
								My Profile
							</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
			
                </div>
            </div>
        </nav>
@endsection
@section('content')
{{-- <body class="layout-default"> --}}
<div class="site-content">
	<!-- Home Jumbotron
    ================================================== -->
	<section class="intro">
		<div class="wrapintro">
			<h1>NEXUS WILD SKIN CARE</h1>
			<h2 class="lead">Why You Just Want To Tell the Story Behind your Beauty</h2>
			<h3 class="lead text-white">{{ $tag->name }}</h3>
			
            
		</div>
		</section>
		<div id="carouselExampleSlidesOnly" class="carousel slide d-md-none" data-bs-ride="carousel">
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<img src="https://cdn.pixabay.com/photo/2016/11/29/10/10/girl-1868930_960_720.jpg" class="d-block w-100 h-70 " alt="woman 1">
			  </div>
			  <div class="carousel-item">
				<img src="https://cdn.pixabay.com/photo/2016/04/21/22/26/mystical-portrait-of-a-girl-1344632_960_720.jpg" class="d-block w-100 h-70" alt="woman 2">
			  </div>
			  <div class="carousel-item">
				<img src="https://cdn.pixabay.com/photo/2018/01/21/14/16/woman-3096664_960_720.jpg" class="d-block w-100 h-70" alt="woman 3">
			  </div>
			</div>
		  </div>
	<!-- Container
    ================================================== -->
	<div class="container-fluid">
		<div class="main-content">
			<!-- Featured
            ================================================== -->

			<!-- Posts Index
        ================================================== -->
			<section class="recent-posts row">
			@include('partials.sidebar')
			<div class="col-md-8">
				<div class="section-title">
					<h2><span>All Stories</span></h2>
				</div>
				<div class="masonrygrid row listrecent">
					<!-- begin post -->
					@foreach($posts as $post)
					<div class="col-md-6 grid-item">
						<div class="card p-5">
							<a href="{{ route('blog.show', $post->id) }}">
							<img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="Tree of Codes">
							</a>
							<div class="card-block">
								<h2 class="card-title"><a href="single.html">{{ $post->category->name }}</a></h2>
								<h3><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h3>
								<h4 class="card-text">{{ $post->description }}</h4>
								<div class="metafooter">
									<div class="wrapfooter">
										<span class="meta-footer-thumb">
											<img src="{{ Gravatar::src($post->user->email) }}" alt="User Gravater">
										</span>
										<span class="author-meta">
										<span class="post-name"><a target="_blank" href="#">{{ $post->user->name }}</a></span><br/>
										<span class="post-date text-danger">{{ $post->published_at }}</span>
										</span>
										<span class="post-read-more"><a href="single.html" title="Read Story"><i class="fa fa-link"></i></a></span>
										<div class="clearfix">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach				
					<!-- end post -->
					  
					<!-- end post -->
				</div>
				@forelse($posts as $post)

				@empty
                <p class="text-center">
				NO result found for: <strong>{{ request()->query('search')  }}</strong>
				</p>
				@endforelse
					{{ $posts->appends(['search' => request()->query('search') ])->links() }}
			</div>
			</section>
		</div>
	</div>
	
</div>

@endsection
<!-- JavaScript
================================================== -->
@section('script')
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src={{ asset('js/scripts.js') }}></script>
<!-- Bootstrap core JS-->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/theme.js"></script> --}}
@endsection 
