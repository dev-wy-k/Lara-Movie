<div x-data="{ isOpen: true }" @click.away="isOpen = false">
    <div class="form-inline my-2 my-lg-0">
        <input 
        wire:model.debounce.500ms="search" 
        class="form-control form-control-sm  mr-sm-2 bg-info border-0 rounded text-white" 
        type="search" placeholder="Search (Press / to focus)" aria-label="Search"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 191){
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isOpen = true" 
        @keydown.escape.window="isOpen = false"
        @keydown="isOpen = true"
        @keydown.shift.tab="isOpen = false"

        >
    </div>

    @if (strlen($search) > 2 )
        
        <div 
        x-show.transition.opacity="isOpen" 
        class="absolute"
        >
            <div class="mb-3">
                @if (count($searchResults) > 0)            
                @foreach ($searchResults as $result)
                    <a href="
                    @if ($result['media_type'] === 'movie' )
                        {{ route('movie.show', $result['id']) }}
                    @elseif($result['media_type'] == 'tv' )
                        {{ route('tv.show', $result['id']) }}
                    @else
                        {{ route('actors.show', $result['id']) }}
                    @endif 
                    " 
                    class="border-bottom bg-info px-3 py-2 mb-0 d-flex justify-content-start align-items-center"
                    @if($loop->last) @keydown.tab.exact="isOpen = false" @endif
                    >
                        <div  class="w-25 mr-1">
                            @if (isset($result['poster_path']))
                                @if (!$result['poster_path'] == null)
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" class="w-75" alt="poster">
                                @else
                                <img src="https://babytorrent.uno/img/default_thumbnail.svg" class="w-75" alt="poster">
                                @endif                                
                            @endif                                
                            @if(isset($result['profile_path']))
                                @if (!$result['profile_path'] == null)
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" class="w-75" alt="poster">
                                @else
                                <img src="https://babytorrent.uno/img/default_thumbnail.svg" class="w-75" alt="poster">
                                @endif 
                            @endif

                            

                        </div>
                        <span class="text-white text-decoration-none w-75">
                            @if (isset($result['title']))
                                {{ Str::words($result['title'], 3, '...') }}
                            @else    
                                {{ Str::words($result['name'], 3, '...') }}
                            @endif
                        </span>                        
                    </a>
                @endforeach
                @else
                <div class="absolute mt-2 bg-info px-3 py-2 mb-0 text-white">
                    No Result for "{{ $search }}"
                </div>
                @endif  
            </div>      
        </div>

    @endif
</div>
