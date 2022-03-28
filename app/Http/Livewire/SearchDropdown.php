<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{

    public $search = '' ;

    public function render()
    {
        $results = [] ;

        if(strlen($this->search) >= 2 ){

            $results = Http::get('https://api.themoviedb.org/3/search/movie?api_key='.config('services.tmdb.token')."&query=$this->search")->json()['results'] ;

        }        
        $searchResults = collect($results)->take(7);
        return view('livewire.search-dropdown', compact('searchResults'));
    }
}
