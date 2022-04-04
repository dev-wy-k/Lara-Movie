@extends('layouts.main')

@section('content')
 <!-- Popular Tv Section  -->
 <div class="row justify-content-centr align-items-start mb-3">
        <div class="col-12">
            <h3 class="text-primary mb-3">Popular Shows</h3>
        </div>

        <div class="owl-carousel sliderr owl-theme" >
            @foreach($popularTv as $tvShow)
                <div class="item p-2 p-md-0">
                    <div class="mb-3 mb-lg-3">
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
                </div>
            @endforeach
        </div>
                 
        
    </div>
    <!-- Popular Tv Section End  -->

    <!-- Top Rated Show Section  -->

    <div class="row justify-content-center align-items-start">
        <div class="col-12">
            <h3 class="text-primary mb-3">Top Rated Shows</h3>
        </div>

        @foreach($topRatedShow as $tvShow)
            <x-tv-card :tvShow="$tvShow" ></x-tv-card>
        @endforeach       

    </div>

    
    <div class="row justify-content-between p-3">
        <div class="">
            @if ($previous)
                <a href="/tv/page/{{ $previous }}" class="btn btn-outline-light text-primary">Previous</a>
            @endif
        </div>
        <div class="">
            @if ($next)
                <a href="/tv/page/{{ $next }}" class="btn btn-outline-light text-primary">Next</a>
            @endif
        </div>
    </div> 
    <!-- Top Rated Show Section End -->
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



