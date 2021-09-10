<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Cyberlord" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="{{ asset('/images/1.ico') }}" />
    <title>@yield('title')</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')

</body>

</html>
