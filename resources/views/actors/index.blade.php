@extends('layouts.main')

@section('content')
 <!-- Popular Actors  -->
 <div class="row justify-content-centr align-items-start mb-3 list">
    <div class="col-12">
        <h3 class="text-primary mb-3">Popular Actors</h3>
    </div>       
    @foreach ($popularActors as $actor)
        <div class="col-6 col-md-4 col-lg-3 mb-3 actorCard">
            <div class="mb-2">
                <a href="{{ route('actors.show', $actor['id']) }}" class="">
                    <img src="{{ $actor['profile_path'] }}" class="img-fluid" alt="">
                </a>
            </div>
            <a href="{{ route('actors.show', $actor['id']) }}" class="mb-0 text-primary text-decoration-none h5">{{ $actor['name'] }}</a>
            <p class="mb-0">
                <small class="text-white">{{ $actor['known_for'] }}</small>
            </p>
        </div> 
    @endforeach
</div>  
<!-- Popular Actors End  -->

{{-- Pagination Prev & Next  --}}
{{-- <div class="row justify-content-between">
    <div class="">
        @if ($previous)
            <a href="/actors/page/{{ $previous }}" class="btn btn-outline-light text-primary">Previous</a>
        @endif
    </div>
    <div class="">
        @if ($next)
            <a href="/actors/page/{{ $next }}" class="btn btn-outline-light text-primary">Next</a>
        @endif
    </div>
</div> --}}
{{-- Pagination Prev & Next End --}}

<div class="scroller-status">
    <div class="d-flex justify-content-center">
        <div class="infinite-scroll-request loader-ellips spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <p class="infinite-scroll-last text-white text-center">End of content</p>
    <p class="infinite-scroll-error text-white text-center">Error</p>
</div>


@endsection

@section('foot')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.list');
        let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actorCard',
            status: '.scroller-status',
        });
    </script>
@endsection