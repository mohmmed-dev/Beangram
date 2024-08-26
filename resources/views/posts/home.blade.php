<x-app-layout>
        <div class="flex flex-row max-w-5xl gap-8 mx-auto">
        {{-- Left --}}
            <livewire:posts-list />
        {{-- Right --}}
        <div class="lg:flex lg:flex-col pt-0 hidden w-[30rem]">
            <div class="flex flex-row bg-white py-2 px-3 rounded-lg items-center gap-x-2">
                <div class="mr-1">
                    <a href="/{{auth()->user()->username}}">
                        <img src="{{auth()->user()->image_profile(auth()->user()->image)}}" alt="{{auth()->user()->username}}" class=" mx-1 w-16 h-16 rounded-full ">
                    </a>
                    </div>
                    <div>
                    <a href="/{{auth()->user()->username}}" class="font-bold">
                    {{auth()->user()->username}}
                    </a>
                    <div>{{auth()->user()->name}}</div>
                </div>
            </div>
            <div class="mt-5">
                <h3 class="font-bold">{{__("Suggeest For You")}}</h3>
                <ul>
                    @foreach ($suggested_users as $suggested_user)
                    <li class="flex flex-row my-4 test-sm items-center bg-white py-2 px-2 rounded-lg justify-between" >
                        <div class="flex items-center">
                            <div class="mx-2">
                                <a href="/{{$suggested_user->username}}"> <img src="{{$suggested_user->image_profile($suggested_user->image)}}" alt="{{$suggested_user->username}}" class="w-14 h-14 rounded-full "></a>
                            </div>
                            <div>
                                <a href="/{{$suggested_user->username}}" class="font-bold">
                                {{$suggested_user->username}}
                                @if (auth()->user()->is_follower($suggested_user))
                                <span class="text-red-500">{{__("follower")}}</span>
                                @endif
                                </a>
                                <div>{{$suggested_user->name}}</div>
                            </div>
                        </div>
                        <livewire:follow-button :userId="$suggested_user->id" />
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
