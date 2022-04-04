<?php

namespace App\ViewModels;

use Illuminate\Support\Carbon;
use Spatie\ViewModels\ViewModel;


class TvShowViewModel extends ViewModel
{
    public $tvShow ;

    public function __construct($tvShow)
    {
        $this->tvShow = $tvShow ;
    }

    public function tvShow(){
        return collect($this->tvShow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500'.$this->tvShow['poster_path'],
            'vote_average' => $this->tvShow['vote_average'] * 10 .'%',
            'first_air_date' => Carbon::parse($this->tvShow['first_air_date'])->format('d M, Y'),
            'genres' => collect($this->tvShow['genres'])->pluck('name')->implode(', ') ,
            'videos' => $this->tvShow['videos']['results'],
            'crew' => collect($this->tvShow['credits']['crew'])->take(2),
            'cast' => collect($this->tvShow['credits']['cast'])->take(6),
            'url' => 'https://image.tmdb.org/t/p/original/',
            'images' => collect($this->tvShow['images']['backdrops'])->pluck('file_path')->take(9),
        ])->only([
            'id' ,'poster_path', 'vote_average', 'first_air_date', 'genres', 'videos', 'credits', 'crew', 'cast', 'url', 'images', 'name', 'overview', 'created_by'
        ]);
    }
}
