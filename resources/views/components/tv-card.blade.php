<div class="col-6 col-md-4 col-lg-2 mb-3 mb-lg-3">
    <a href="{{ route('tv.show',$tvShow['id']) }}" class="mb-3">
        <img src="{{ $tvShow['poster_path'] }}" class="img-fluid" alt="poster">
    </a>
    <div class="mt-2">
        <a href="{{ route('tv.show',$tvShow['id']) }}" class="text-white mb-0 h5 font-weight-bolder text-decoration-none">{{ $tvShow['name'] }}</a>
        <p class="text-white mb-0">
            <small class="text-primary">{{ $tvShow['vote_average'] }}</small>
            {{ $tvShow['first_air_date'] }}
        </p>
        <small class="text-white">
            {{ $tvShow['genres'] }}
        </small>
    </div>
</div>