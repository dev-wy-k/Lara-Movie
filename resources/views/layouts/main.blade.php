<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/app.css">

        <title>Movie App</title>

        @yield('head')
    </head>
    <body>
        <div class="container-fluid bg-dark min-vh-100">
            <div class="row py-2">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
                    <a class="navbar-brand" href="{{ route('movie.index') }}">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-compact-disc fa-2x text-primary mr-2"></i>
                            <span class="text-primary">Movie App</span>
                        </div>
                    </a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>                
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
                     <hr>           
            <div class="row py-3">                
                <div class="container">                        
                    @yield('content')
                </div>
            </div>
        </div>      
        
        <script src="/js/app.js"></script>
    </body>
</html>
