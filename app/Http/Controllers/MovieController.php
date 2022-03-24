<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key='.config('services.tmdb.token'))->json()['results'] ;

        $nowPlay = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key='.config('services.tmdb.token'))->json()['results'] ;

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key='.config('services.tmdb.token'))->json()['genres'] ;

        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']] ;
        });

        $popularMovies = array_slice($movies, 0, 18);
        $nowPlayingMovies = array_slice($nowPlay, 0, 18);

        // dump($nowPlayingMovies)  ;

        return view('movie', compact('popularMovies', 'genres', 'nowPlayingMovies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=".config('services.tmdb.token').'&append_to_response=credits,videos,images')->json() ;

        // dump($movie) ;
        return view('detail', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
