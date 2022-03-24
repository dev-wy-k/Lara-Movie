@extends('layouts.main')

@section('content')
    <!-- Movie Info  -->
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-10 col-md-4 mb-5">
            <div class="">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="col-12 col-md-8 mb-5">
            <h2 class="text-primary font-weight-bold">{{ $movie['title'] }}</h2>
            <p class="text-white">
                <span class="text-primary">{{ $movie['vote_average'] * 10 }}%</span>
                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span> | 
                <small>
                @foreach($movie['genres'] as $genre)
                    {{ $genre['name'] }}@if(!$loop->last) | @endif
                @endforeach
                </small>
            </p>

            <p class="text-white my-3 my-md-5">
                {{ $movie['overview'] }}
            </p>

            <h4 class="text-white mb-3">Featured Crew</h4>

            <div class="d-flex mb-3">
                @foreach($movie['credits']['crew'] as $crew)
                    @if($loop->index < 2)
                        <div class="text-white mr-3">
                            <p class="mb-0">{{$crew['name']}}</p>
                            <small>{{$crew['job']}}</small>
                        </div>
                    @endif
                @endforeach
            </div>
            @if(count($movie['videos']['results']) > 0 )
            <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blink" class="btn btn-primary">
                <i class="fas fa-play mr-2"></i>
                Play Trailer
            </a>
            @endif
        </div>
    </div>
    <!-- Movie Info End  -->

    <hr>

    <!-- Movie Cast  -->

    <div class="row justify-content-center align-items-start mb-5">
        <div class="col-12">
            <h3 class="text-primary mb-3">Casts</h3>
        </div>
        @foreach($movie['credits']['cast'] as $cast)
            @if($loop->index < 6 && isset($cast['profile_path']) )
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" class="img-fluid" alt="">
                    <h5 class="text-white mb-0 mt-2">{{ $cast['name'] }}</h5>
                    <p class="text-white mb-0">{{ $cast['character'] }}</p>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Movie Cast End -->
    <hr>
    <!-- Image  -->

    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-12">
            <h3 class="text-primary mb-3">Images</h3>
        </div>
        @foreach($movie['images']['backdrops'] as $photo)
            @if($loop->index < 9)
                <div class="col-6 col-md-4 mb-3">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$photo['file_path'] }}" class="img-fluid" alt="">
                </div>        
            @endif
        @endforeach
    </div>

    <!-- Image End -->
@endsection