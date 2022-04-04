<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowViewModel;
use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {

        $popularTv = Http::get('https://api.themoviedb.org/3/tv/popular?api_key='.config('services.tmdb.token'))->json()['results'] ;

        $topShow = Http::get("https://api.themoviedb.org/3/tv/top_rated?page=$page&api_key=".config('services.tmdb.token'))->json()['results'] ;

        $genres = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key='.config('services.tmdb.token'))->json()['genres'] ;

        

        // $popularMovies = array_slice($movies, 0, 18);
        $topRatedShow = array_slice($topShow, 0, 18);

        $viewModel = new TvViewModel(
            $popularTv,
            $topRatedShow,
            $genres,
            $page
        );
        
        return view('tv.index', $viewModel);
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
        $tvShow = Http::get("https://api.themoviedb.org/3/tv/$id?api_key=".config('services.tmdb.token').'&append_to_response=credits,videos,images')->json() ;

        $viewModel = new TvShowViewModel($tvShow);

        return view('tv.show', $viewModel);
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
