<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor ;
    public $social ;
    public $credits ;

    public function __construct($actor, $social, $credits)
    {
        $this->actor = $actor ;
        $this->social = $social ;
        $this->credits = $credits ;
    }

    public function actor(){
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('d M, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age ,
            'profile_path' => $this->actor['profile_path']
            ? 'https://www.themoviedb.org/t/p/w300'.$this->actor['profile_path']
            : 'https://ui-avatars.com/api/?size=235&name='.$this->actor['name'],
        ])->only([
            'birthday', 'age', 'profile_path', 'name', 'place_of_birth', 'biography', 'homepage'
        ]);
    }

    public function social(){
        return collect($this->social)->merge([
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'twitter', 'instagram'
        ]);
    }

    public function knownForMovie(){

        $castMovie = collect($this->credits)->get('cast');

        return collect($castMovie)->where('media_type', 'movie')->sortByDesc('popularity')->take(4)
        ->map(function($movie){
            return collect($movie)->merge([
                'title' => isset($movie['title']) ? $movie['title'] : "Untitled" ,
                'poster_path' => $movie['poster_path'] 
                ?'https://image.tmdb.org/t/p/w185'.$movie['poster_path'] 
                : 'https://babytorrent.uno/img/default_thumbnail.svg',
            ])->only([
                'title', 'id', 'poster_path'
            ]);
        });

    }

    public function credits(){

        $castMovie = collect($this->credits)->get('cast');

        return collect($castMovie)->map(function($movie){

            if(isset($movie['release_date'])){
                $releaseDate = $movie['release_date'];
            }else if(isset($movie['first_air_date'])){
                $releaseDate = $movie['first_air_date'];
            }else{
                $releaseDate = '';
            }

            if(isset($movie['title'])){
                $title = $movie['title'];
            }else if(isset($movie['name'])){
                $title = $movie['name'];
            }else{
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'releaste_date' => $releaseDate ,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future' ,
                'title' => $title ,
                'character' => isset($movie['character']) ? $movie['character'] : '' ,
            ])->only([
                'release_date', 'release_year', 'title', 'character'
            ]);
        })->sortByDesc('release_date');   
        
    }
}
