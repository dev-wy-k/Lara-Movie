@extends('layouts.main')

@section('content')
    <!-- Actor Info  -->
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col-10 col-lg-4 mb-5">
            <div class="text-center">
                <div class="">
                    <img src="{{ $actor['profile_path'] }}" class="img-fluid" alt="">
                </div>

                <div class="d-flex justify-content-center">
                    @if ($social['facebook']) 
                        <span class="ml-3 mt-3">
                            <a href="{{ $social['facebook'] }}" title="Facebook" class="text-primary text-decoration-none">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                        </span>
                    @endif
                    
                    @if ($social['twitter'])
                    <span class="ml-3 mt-3">
                        <a href="{{ $social['twitter'] }}" title="Twitter" class="text-primary text-decoration-none">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </span>
                    @endif

                    @if ($social['instagram'])                    
                    <span class="ml-3 mt-3">
                        <a href="{{ $social['instagram'] }}" title="Instagram" class="text-primary text-decoration-none">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </span>
                    @endif

                    @if ($actor['homepage'])                            
                        <span class="ml-3 mt-3">
                            <a href="{{ $actor['homepage'] }}" title="Website" class="text-primary text-decoration-none">
                                <i class="fas fa-globe-asia fa-2x"></i>
                            </a>
                        </span>
                    @endif
                </div>
            </div>            
        </div>

        <div class="col-12 col-lg-8 mb-5">
            <h2 class="text-primary font-weight-bold">{{ $actor['name'] }}</h2>
            <p class="text-white">
                <span class="text-white">
                    <i class="fas fa-birthday-cake text-primary ml-1"></i>
                    {{ $actor['birthday'] }} ( {{ $actor['age'] }} years old ) in {{ ($actor['place_of_birth']) }}
                </span>
            </p>

            <p class="text-white my-3 my-md-5">
                {{  $actor['biography']  }}
            </p>

            <p class="text-primary mb-3">Known For</p>

            <div class="row justify-content-center">
                @foreach ($knownForMovie as $movie)                    
                    <div class="col-6 col-lg-3 ">
                        <a href="{{ route('movie.show', $movie['id']) }}" class="text-decoration-none text-center">
                            <div class="text-center mb-2">
                                <img src="{{ $movie['poster_path'] }}" class="img-fluid" alt="poster">
                            </div>
                            <p class="text-white text-nowrap overflow-hidden">{{ $movie['title'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Actor Info End  --> 

    <hr>

    <!-- Credits  -->

    <div class="row my-0">
        <div class="col-12">
            <h3 class="text-primary mb-3">Credits</h3>
        </div>

        <ul class="">
            @foreach ($credits as $credit)                
                <li class="text-white h5 p-2">{{ $credit['release_year'] }} &middot; <strong class="text-primary">{{ $credit['title'] }}</strong> {{ $credit['character'] }}</li>
            @endforeach
        </ul>

    </div>

    <!-- Credits End -->
       
@endsection