<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Cyberlord" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{ asset('/images/1.jpg') }}" />
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body>
    <div id="app">
       @yield('nav')
        @if(session()->has('success'))
        <div class="alert alert-success text-success text-center mx-5">
            {{ session()->get('success')  }}
           </div> 
           @endif
        @if(session()->has('error'))
        <div class="alert alert-danger text-danger text-center mx-5">
            {{ session()->get('error')  }}
           </div> 
           @endif
            <main  class="py-4 ">
                @auth
                <div class="container-fluid">
                    <div class="row">
                        @yield('adminnav')
                        <div class="col-md-10">
                        @yield('content')
                         </div>
                        </main>
                    </div>
               </div>
                @else
                @yield('content')
                @endauth

           <div>
            @include('layouts.footer')
        </div>
   

    </div>
    @yield('script')
</body>
</html>
