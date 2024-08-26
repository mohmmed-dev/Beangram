<div >
    <ul class="shadow-xl bg-white w-56 md:w-64 lg:w-96 z-30 rounded-sm p-1 ease-in duration-300">
        @forelse (auth()->user()->pending_followers() as $pending)
        <li class="flex border-2 rounded-sm p-1 cursor-pointer ease-in duration-300 justify-between items-center">
            <div class="flex items-center justify-between">
            <div class="mx-2">
                <a href="/{{$pending->username}}"> <img src="{{$pending->image}}" alt="{{$pending->username}}" class="w-14 h-14 rounded-full "></a>
            </div>
            <div>
                <a href="/{{$pending->username}}" class="font-bold">
                {{$pending->username}}
                </a>
                <div>{{$pending->name}}</div>
            </div>
            </div>
           <div class="flex">
             <button class="text-blue-500 mx-2" wire:click="confirm({{$pending->id}})">{{__("Confirm")}}</button>
            <button class="text-red-500" wire:click="delete({{$pending->id}})">{{__("Delete")}}</button>
           </div>
        </li>
        @empty
        <h2 class="w-full text-center text-lg">{{__("here is Nothing")}}</h2>
        @endforelse
    </ul>
</div>
