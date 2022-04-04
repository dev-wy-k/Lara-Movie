<div>
    <div class="form-inline my-2 my-lg-0" x-data="{ isOpen:true }" @click.away="isOpen=false">
        <input wire:model.debounce.500ms="search" class="form-control mr-sm-2 bg-info border-0 text-white" type="search" placeholder="Search Movie" aria-label="Search">
    </div>

    @if (strlen($search) > 2 )
        
        <div class="absolute" x-show="isOpen" @keydown.escape.window="isOpen = false">
            <div class="mb-3">
                @if (count($searchResults) > 0)            
                @foreach ($searchResults as $result)
                    <div class="border-bottom bg-info px-3 py-2 mb-0 d-flex justify-content-start align-items-center">
                        <a href="{{ route('movie.show', $result['id']) }}" class="w-25 mr-1">
                            @if ($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" class="w-75" alt="poster">
                            @else
                            <img src="https://babytorrent.uno/img/default_thumbnail.svg" class="w-75" alt="poster">
                            @endif
                        </a>
                        <a href="{{ route('movie.show', $result['id']) }}" class="text-white text-decoration-none w-75">
                            {{ Str::words($result['title'], 3, '...') }}
                        </a>                        
                    </div>
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
