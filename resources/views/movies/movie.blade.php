@extends('layouts.main')

@section('content')
 <!-- Popular Section  -->
 <div class="row justify-content-centr align-items-start mb-3">
        <div class="col-12">
            <h3 class="text-primary mb-3">Popular Movies</h3>
        </div>

        <div class="owl-carousel sliderr owl-theme" >
            @foreach($popularMovies as $movie)
                <div class="item p-2 p-md-0">
                    <div class="mb-3 mb-lg-3">
                        <a href="{{ route('movie.show',$movie['id']) }}" class="mb-3">
                            <img src="{{ $movie['poster_path'] }}" class="img-fluid" alt="poster">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movie.show',$movie['id']) }}" class="text-white mb-0 h5 font-weight-bolder text-decoration-none">{{ $movie['title'] }}</a>
                            <p class="text-white mb-0">
                                <small class="text-primary">{{ $movie['vote_average'] }}</small>
                                {{ $movie['release_date'] }}
                            </p>
                            <small class="text-white">
                                {{ $movie['genres'] }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
                 
        
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
    </div>

    
    <div class="row justify-content-between">
        <div class="">
            @if ($previous)
                <a href="/page/{{ $previous }}" class="btn btn-outline-light text-primary">Previous</a>
            @endif
        </div>
        <div class="">
            @if ($next)
                <a href="/page/{{ $next }}" class="btn btn-outline-light text-primary">Next</a>
            @endif
        </div>
    </div> 
    <!-- Now Playing Section End -->
@endsection

@section('foot')
<script>
    $(document).ready(function(){
        $('.sliderr').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    margin:10,
                    autoplay:true,
                    autoplayTimeout: 1500,
                    autoplayHoverPause:true,
                    slideBy:1
                },
                600:{
                    items:3,
                    autoplay:true,
                    autoplayTimeout: 1500,
                    autoplayHoverPause:true,
                    slideBy:1
                },
                1000:{
                    items:6,
                    margin:30,
                    autoplay:true,
                    autoplayTimeout: 2500,
                    autoplayHoverPause:true,
                    slideBy:2
                }
            }
        })
    });
		
</script>
@endsection



