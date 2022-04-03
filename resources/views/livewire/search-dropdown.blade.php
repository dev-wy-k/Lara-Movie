<div x-data="{ isOpen: true }" @click.away="isOpen = false">
    <div class="form-inline my-2 my-lg-0">
        <input 
        wire:model.debounce.500ms="search" 
        class="form-control form-control-lg mr-sm-2 bg-info border-0 rounded text-white" 
        type="search" placeholder="Search(Press / to focus)" aria-label="Search"
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
                    <a href="{{ route('movie.show', $result['id']) }}" 
                    class="border-bottom bg-info px-3 py-2 mb-0 d-flex justify-content-start align-items-center"
                    @if($loop->last) @keydown.tab.exact="isOpen = false" @endif
                    >
                        <div  class="w-25 mr-1">
                            @if ($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" class="w-75" alt="poster">
                            @else
                            <img src="https://babytorrent.uno/img/default_thumbnail.svg" class="w-75" alt="poster">
                            @endif
                        </div>
                        <span class="text-white text-decoration-none w-75">
                            {{ Str::words($result['title'], 3, '...') }}
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
