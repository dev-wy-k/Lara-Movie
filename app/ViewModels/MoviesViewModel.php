<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $nowPlayingMovies;
    public $popularMovies;
    public $genres;
    
    public function __construct($popularMovies, $nowPlayingMovies, $genres)
    {
        $this->popularMovies = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }

    public function popularMovies(){
        
        return $this->formatMovies($this->popularMovies) ;

    }

    public function nowPlayingMovies(){

        return $this->formatMovies($this->nowPlayingMovies) ;

    }

    public function genres(){
        
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']] ;
        });

    }

    public function formatMovies($movies){

        return collect($movies)->map(function($movie){

            $genreFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value => $this->genres()->get($value)] ;
            })->implode(', ');

            

            return collect($movie)->merge([
                'title' => Str::words($movie['title'], 3, ' ...'),
                'poster_path' => "https://image.tmdb.org/t/p/w500/".$movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 .'%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genreFormatted,
            ])->only([
                'id', 'title', 'poster_path', 'vote_average', 'release_date', 'genre_ids', 'genres', 'overview', 'original_title'
            ]);
        }) ;

    }
}
