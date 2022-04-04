<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popularTv;
    public $topRatedShow;
    public $genres;
    public $page;
    
    public function __construct($popularTv, $topRatedShow, $genres, $page)
    {
        $this->popularTv = $popularTv;
        $this->topRatedShow = $topRatedShow;
        $this->genres = $genres;
        $this->page = $page;
    }

    public function popularTv(){
        
        return $this->formantTv($this->popularTv) ;

    }

    public function topRatedShow(){

        return $this->formantTv($this->topRatedShow) ;

    }

    public function genres(){
        
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']] ;
        });

    }

    public function formantTv($tv){
        return collect($tv)->map(function($tvShow){

            $genreFormatted = collect($tvShow['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)] ;
            })->implode(', ');            

            return collect($tvShow)->merge([
                'name' => Str::words($tvShow['name'], 3, ' ...'),
                'first_air_date' => Carbon::parse($tvShow['first_air_date'])->format('d M, Y'),
                'poster_path' => $tvShow['poster_path'] 
                ?  "https://image.tmdb.org/t/p/w500/".$tvShow['poster_path']
                : 'https://babytorrent.uno/img/default_thumbnail.svg' ,
                'vote_average' => $tvShow['vote_average'] * 10 .'%',
                'genres' => $genreFormatted,
            ])->only([
                'id', 'name', 'poster_path', 'vote_average', 'first_air_date', 'genre_ids', 'genres', 'overview', 'original_name'
            ]);
        }) ;

    }

    public function previous(){
        return $this->page > 1 ? $this->page - 1 : null ;
    }

    public function next(){
        return $this->page < 119 ? $this->page + 1 : null ;
    }
}
