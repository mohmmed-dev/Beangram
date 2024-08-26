<div >
    <div class="flex">
    <h2 class="w-full text-center text-lg my-2">{{__("Following")}}</h2>
    <button wire:click="$dispatch('closeModal')" class="mx-3 text-2xl">X</button>
    </div>
    <ul class="p-0 border-t overflow-y-auto max-h-80 scroll-smooth">
        @forelse ($this->followers_list as $followers)
        <li class="flex flex-row my-1 test-sm items-center bg-slate-50 p-2 mx-2 rounded-md justify-between">
            <div class="flex items-center">
                <div class="mr-5">
                <a href="/{{$followers->username}}"> <img src="{{$followers->image_profile($followers->image)}}" alt="{{$followers->username}}" class="w-14 h-14 rounded-full "></a>
            </div>
            <div class="mx-2">
                <a href="/{{$followers->username}}" class="font-bold">
                {{$followers->username}}
                </a>
                <div>{{$followers->name}}</div>
            </div>
            </div>
            @auth
            @if (!$this->user->is_following($followers))
            <button wire:click="BackFollow({{$followers->id}})" class="border-1 rounded-sm px-2 py-1">{{__('BackFollow')}}</button>
            @endif
        @endauth
        </li>
        @empty
        <h2 class="w-full text-center text-lg my-3 ">{{__("Here Is Nothing")}}</h2>
        @endforelse
    </ul>
</div>
