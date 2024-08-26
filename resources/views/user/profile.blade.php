<x-app-layout>
    {{-- Start UpDate Message --}}
    <div class="absolute py-2 px-3 rounded-md right-11 bg-lime-300 text-white {{session('success') ? '' :'hidden'}}">
    <span>{{session('success')}}</span>
    </div>
    {{-- End UpDate Message --}}
    {{-- Start Info --}}
    <div class="grid md:grid-cols-4 mb-5 pb-3 border-b-2 justify-center items-center align-middle text-center">
        {{-- User Image --}}
        <div class="px-4 flex justify-center col-span-2 md:col-span-1">
            <img src="{{$user->image_profile($user->image)}}" alt="{{$user->username}}" class="rounded-full w-20 h-20 md:w-40 md:h-40 border border-neutral-300 ">
        </div>
        {{--User Info--}}
        <div class="col-span-2 px-4 md:ml-0 order-2 md:col-span-2">
            {{-- User Name --}}
            <div class="mx-2 md:flex justify-around items-center">
                <div class="mb-2 text-xl">{{$user->username}}</div>
                    <div class="mx-auto w-fit md:m-0">
                        @auth
                        @if($user->id == auth()->id())
                            <a href="/{{$user->username}}/edit" class="text-lime-700 border-2 px-2 py-1 w-fit block m-2">{{__("Edit Profile")}}</a>
                        @else
                            <livewire:follow-button :userId="$user->id" classes=" border-2 px-2 py-1 w-fit block m-2 "/></livewire>
                        @endif
                        @endauth
                        @guest
                            <a href="{{$user->username}}/follow">{{(__("follow"))}}</a>
                        @endguest
                    </div>
            </div>
            {{-- User Info --}}
            <div class="mx-2 md:flex items-end">
                <div>
                    <div class="text-md my-2">
                        <p class="mb-2">{{$user->name}}</p>
                        <h3>{{__('bio')}}</h3>
                        <p class="text-sm">{!!  nl2br(e($user->bio)) !!}</p>
                    </div>
                </div>
                <div class="flex justify-center w-fit mx-auto" >
                    <ul class="flex gap-x-3 mx-auto ">
                        <li class="md:border-2 md:py-2 md:px-1  w-fit"><strong>{{$user->posts->count()}}</strong> {{$user->posts->count() > 1 ? __('Posts') : __('Post');}}</li>
                        <li class="md:border-2 md:py-2 md:px-1  w-fit"><livewire:followers :userId="$user->id"/></li>
                        <li class="md:border-2 md:py-2 md:px-1 w-fit"><livewire:following :userId="$user->id"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- End Info --}}
    {{-- Start Posts --}}
    @if ($user->posts()->count() > 0 && ($user->privavte_account == false || auth()->id() == $user->id))
        <div class="grid grid-cols-3 gap-x-4 gap-y-2 mx-2 items-center justify-start">
            @foreach ($user->posts as $post)
         <div class=" bg-white w-full overflow-hidden h-52 flexk justify-start items-center " >
            <a href="/p/{{$post->slug}}" class="flex w-full h-52 justify-end items-center overflow-hidden ">
                @if($post->file_type == 'image')
                    <img class="w-full" src='{{$post->post_image($post->files()[0])}}' alt='{{$post->description}}'>
                @else
                    <video src="{{$post->post_image($post->files()[0])}}"></video>
                @endif
            </a>
            </div>
                @endforeach
        </div>
    @else
    <div class="text-center text-2xl">
        @if($user->privavte_account == true && $user->id !== auth()->id())
        {{__("This Account Is Private Flllow to see Thier Photos.")}}
        @else
        {{__("This User Does Not Have Any Posts")}}
        @endif
    </div>
    @endif
    {{-- End Posts --}}
</x-app-layout>

