<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('owl/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('owl/dist/assets/owl.theme.default.css') }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <link rel="stylesheet" href="/css/app.css">   
        
        <!-- Primary Meta Tags -->
        <title>Movies Website</title>
        <meta name="title" content="Movies Website">
        <meta name="description" content="With Laravel and TMDB API Dev By WYK">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://wyk.mms-student.online/">
        <meta property="og:title" content="Movies Website">
        <meta property="og:description" content="With Laravel and TMDB API Dev By WYK">
        <meta property="og:image" content="{{ asset('meta.png') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="http://wyk.mms-student.online/">
        <meta property="twitter:title" content="Movies Website">
        <meta property="twitter:description" content="With Laravel and TMDB API Dev By WYK">
        <meta property="twitter:image" content="{{ asset('meta.png') }}">

        <title>Movie App</title>

        @yield('head')
        @livewireStyles
    </head>
    <body class="bg-dark">
        <div class="container min-vh-100">
            <div class="row py-2">
                <nav class="navbar navbar-expand-lg navbar-dark w-100">
                    <a class="navbar-brand mr-0 mr-md-3" href="{{ route('movie.index') }}">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-compact-disc fa-2x text-primary mr-2"></i>
                            <span class="text-primary h4 mb-0">Movie App</span>
                        </div>
                    </a>

                    <div class="d-flex align-items-center">
                        <div class="d-block d-lg-none">
                            <livewire:search-dropdown /> 
                        </div>
    
                        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>  
                    </div>                  

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="{{ route('movie.index') }}">Movie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="{{ route('tv.index') }}">TV Shows</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="{{ route('actors.index') }}">Actors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-primary" href="{{ route('about.index') }}">About</a>
                            </li>                 
                        </ul>
                        <div class="ml-auto d-none d-lg-block">
                            <livewire:search-dropdown /> 
                        </div>
                    </div>
                </nav>
            </div>
                     <hr>           
            <div class="row py-4 py-lg-5">                
                <div class="container">                        
                    @yield('content')
                </div>
            </div>

            <div class="text-center text-white p-2">
                <p>
                    Copy Right © 2022 <a href="{{ route('movie.index') }}"class="text-white text-decoration-none">Movie App</a> |
                    Created by <a href="{{ route('about.index') }}" class="text-white text-decoration-none">Wai
                        Yan Kyaw</a>
                </p>
            </div>
        </div>
        
        @livewireScripts
        <script src="/js/app.js"></script>
        <script src="{{ asset('owl/dist/owl.carousel.min.js') }}"></script>
        @yield('foot')
    </body>
</html>
