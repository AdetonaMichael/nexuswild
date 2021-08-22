@extends('layouts.bloghome')
@section('title')
{{ $post->title }}
@endsection
@section('nav')
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="\images\nexus.svg" width="150" height="100" style="border-radius:75%" height="50" alt="Nexus Wild Skin Care" /></a>
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
<div class="site-content">
    	<!-- Home Jumbotron
    ================================================== -->
	<section class="intro">
		<div class="wrapintro">
			<h1>NEXUS WILD SKIN CARE</h1>
			<h2 class="lead">Why You Just Want To Tell the Story Behind your Beauty</h2>
			<h3 class="lead text-white">{{ $post->name }}</h3>
			
            
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
	<div class="container">
		<!-- Content
    ================================================== -->
		<div class="main-content">
			<!-- Begin Article
            ================================================== -->
			<div class="row">			
				<!-- Post -->
				<div class="col-sm-8">
					<div class="mainheading">
						<!-- Post Categories -->
                        <div class="after-post-tags">
							<ul class="tags">
                        @foreach ($post->tags as $tag )
								<li>
								<a href="{{ route('blog.tag',$tag->id) }}">{{ $tag->name }}</a>
                                </li>
                        @endforeach
                    </ul>
                </div>
						<!-- End Categories -->
						<!-- Post Title -->
                        <hr/>
						<h1 class="posttitle">{{ $post->title }}</h1>
                        <hr/>
					</div>
					<!-- Post Featured Image -->
					<img class="featured-image img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="">
					<!-- End Featured Image -->
					<!-- Post Content -->
					<div class="article-post">
						{{!! $post->content !!}}
						<div class="clearfix">
						</div>
					</div>
					<!-- Post Date -->
					<p>
						<small>
						<span class="post-date"><time class="post-date text-danger" datetime="2018-01-12">{{ $post->published_at }}</time></span>
						</small>
					</p>
		           <hr/>
					<!-- Author Box -->
					<div class="row post-top-meta">
						<div class="col-md-2">
							<img src="{{ Gravatar::src($post->user->email) }}" alt="User Gravater">
						</div>
						<div class="col-md-10">
							<a target="_blank" class="link-dark" href="#">{{ $post->user->name }}</a><a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
							<span class="author-description">{{ $post->user->about }}</span>
						</div>
					</div>
                    <hr/>
					<!-- Begin Comments
                    ================================================== -->
                    {{-- <section>
                    <div id="comments">
                        <section class="disqus">
                        <div id="disqus_thread">
                        </div>
                        <script type="text/javascript">
                            var disqus_shortname = 'demowebsite'; 
                            var disqus_developer = 0;
                            (function() {
                                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                dsq.src = window.location.protocol + '//' + disqus_shortname + '.disqus.com/embed.js';
                                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                            })();
                        </script>
                        <noscript>
                        Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                        </noscript>                        
                        </section>
                    </div>
                    </section> --}}
                    <!--End Comments
                    ================================================== -->
				</div>
				<!-- End Post -->
                
                <!-- Sidebar -->
				@include('partials.sidebar')
                <!-- End Sidebar -->
                
			</div>

		</div>
	</div>
	<!-- /.container -->

</div>
@endsection
@section('script')
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src={{ asset('js/scripts.js') }}></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61210f2ea766e0e5"></script>
@endsection 
