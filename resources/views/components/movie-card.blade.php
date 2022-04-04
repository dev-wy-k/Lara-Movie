<div class="col-6 col-md-4 col-lg-2 mb-3 mb-lg-3">
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