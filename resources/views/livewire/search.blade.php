<div>
    <input type="search" name="search" wire:model.live="searchInput"
    class="ease-in duration-300 w-56 md:w-64 lg:w-96 border-none bg-gray-100 rounded-xl h-10 focus:ring-lime-600 focus:border-lime-600" required placeholder="{{__('Search')}}" autocomplete="off">
    <div>
        @if(!empty($results) and !empty($searchInput))
        <ul class="absolute shadow-xl bg-white w-56 md:w-64 lg:w-96 z-30 rounded-sm p-1 mt-2 ease-in duration-300">
            @foreach ($results as $result)
            <li  class="flex border-2 rounded-sm hover:bg-gray-100  my-1 p-2 cursor-pointer ease-in duration-300" wire:key="user_{{$result->id}}"  wire:click="goto('{{$result->username}}')">
                <div>
                    <img src="{{$result->image}}" alt="{{$result->username}}" class="w-14 h-14 rounded-full">
                </div>
                <div class="mx-2">
                    <a href="/{{$result->username}}">{{$result->username}}</a>
                    <p>{{$result->name}}</p>
                </div>
            </li>
            @empty($result)
            <li>
                {{__("There Are no result")}}
            </li>
            @endempty
            @endforeach
        </ul>
        @endif
    </div>
</div>
