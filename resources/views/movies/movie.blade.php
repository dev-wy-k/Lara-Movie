@extends('layouts.main')

@section('content')
 <!-- Popular Section  -->
 <div class="row justify-content-centr align-items-start mb-3">
        <div class="col-12">
            <h3 class="text-primary mb-3">Popular Movies</h3>
        </div>
        @foreach($popularMovies as $movie)
            <x-movie-card :movie="$movie" ></x-movie-card>
        @endforeach       
    </div>
    <!-- Popular Section End  -->

    <!-- Now Playing Section  -->

    <div class="row justify-content-center align-items-start">
        <div class="col-12">
            <h3 class="text-primary mb-3">Now Playing Movies</h3>
        </div>

        @foreach($nowPlayingMovies as $movie)
            <x-movie-card :movie="$movie" ></x-movie-card>
        @endforeach       

    <!-- Now Playing Section End -->
@endsection