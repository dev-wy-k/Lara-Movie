@extends('layouts.main')

@section('content')
    <!-- Tv Show Info  -->
    <div class="row justify-content-center align-items-center mb-5">
        <div class="col-10 col-md-4 mb-5">
            <div class="">
                <img src="{{ $tvShow['poster_path'] }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="col-12 col-md-8 mb-5">
            <h2 class="text-primary font-weight-bold">{{ $tvShow['name'] }}</h2>
            <p class="text-white">
                <span class="text-primary">{{ $tvShow['vote_average'] }}</span>
                <span>{{ ($tvShow['first_air_date']) }}</span> | 
                <small>
                    {{ $tvShow['genres'] }}
                </small>
            </p>

            <p class="text-white my-3 my-md-5">
                {{ $tvShow['overview'] }}
            </p>

            <h4 class="text-white mb-3">Featured Crew</h4>

            <div class="d-flex mb-3">
                @foreach($tvShow['crew'] as $crew)
                    <div class="text-white mr-3">
                        <p class="mb-0">{{$crew['name']}}</p>
                        <small>Creator</small>
                    </div>
                @endforeach
            </div>
            @if(count($tvShow['videos']) > 0 )
            <button class="btn btn-primary" data-toggle="modal" data-target="#videoTrailer">
                <i class="fas fa-play mr-2"></i>
                Play Trailer
            </button>
            @endif
        </div>
    </div>
    <!-- Tv Show Info End  -->
    
    <!--Tv Show Trailer Modal -->
    <div class="modal fade" id="videoTrailer" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="staticBackdropLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="videoWrapper">
                    @if(count($tvShow['videos']) > 0 )
                        <iframe width="560" height="349" src="{{ 'https://www.youtube.com/embed/'.$tvShow['videos'][0]['key'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <!-- Movie Cast  -->

    <div class="row justify-content-center align-items-start mb-5">
        <div class="col-12">
            <h3 class="text-primary mb-3">Casts</h3>
        </div>
        @foreach($tvShow['cast'] as $cast)
            @if(isset($cast['profile_path']) )
                <a href="{{ route('actors.show', $cast['id']) }}" class="col-6 col-md-4 col-lg-2 text-decoration-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$cast['profile_path'] }}" class="img-fluid" alt="">
                    <h5 class="text-white mb-0 mt-2">{{ $cast['name'] }}</h5>
                    <p class="text-white mb-0">{{ $cast['character'] }}</p>
                </a>
            @endif
        @endforeach
    </div>

    <!-- Movie Cast End -->
    <hr>
    <!-- Image  -->

    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <h3 class="text-primary mb-3">Images</h3>
        </div>
        @foreach($tvShow['images'] as $photo)
                <div class="col-6 col-md-4 mb-3" data-toggle="modal" data-target="#ImageModel{{ $loop->index }}">
                    <img src="{{ $tvShow['url'].$photo }}" class="img-fluid" alt="">
                    
                </div> 

                <!--Image Modal -->
                <div class="modal fade" id="ImageModel{{ $loop->index }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h5 class="modal-title text-white" id="staticBackdropLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-white">
                                    <img src="{{ $tvShow['url'].$photo }}" class="img-fluid" alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
        @endforeach
    </div>

    <!-- Image End -->
       
    
@endsection