<x-app-layout>
    <div class="lg:flex lg:h-screen pb-6 lg:flex-row">
        {{-- Left Side --}}
        <div class="h-full lg:w-6/12 bg-black flex items-center justify-center">
            <div class="relative lg:w-full">
                <livewire:image-slider :post="$post">
            </div>
        </div>
        {{-- Right Side --}}
        <div class=" bg-slate-50 border-b-2 lg:w-6/12 flex flex-col justify-between">
            {{-- Top --}}
            <div>
                <div class="flex items-center p-5 justify-between">
                    <div class="flex items-center">
                        <img src="{{$post->owner->image_profile($post->owner->image)}}" alt="{{$post->owner->username}}" class="mx-2 h-16 w-16 rounded-full">
                        <a href="/{{$post->owner->username}}" class="font-bold">{{$post->owner->username}}</a>
                        </div>
                        @can('update',$post)
                        <div class="flex gap-x-2">
                            <button class="text-blue-500" onclick="Livewire.dispatch('openModal', { component: 'edit-post-modal' , arguments: { post: {{$post->id}} }})">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>                        </button>
                            <form action="/p/{{$post->slug}}/delete" method="POST">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="text-red-500 bg-transparent" onclick="return confirm('Are Your Suer?')"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></button>
                            </form>
                        </div>
                        @endcan
                        @cannot('update',$post)
                        <livewire:follow-button :userId="$post->owner->id" classes="border-2 px-2 py-1 w-fit block m-2"/>
                        @endcannot
                </div>
                <div class="mx-5 mb-3 text-xl">
                    {{$post->description}}
                </div>
                <div class="border-t-2 p-3"></div>
            </div>
            {{-- Middle --}}
            <div class="qrow overflow-y-auto px-3 overflow-hidden flex-1">
                {{-- Comments --}}
                @foreach ($post->comments as $comment)
                <div class="flex justify-between items-center pm-5 py-2 cursor-pointer">
                    <div class="flex items-start">
                        <img class="mr-5 h-10 w-10 rounded-full" src="{{$comment->owner->image_profile($comment->owner->image)}}" alt="{{$comment->owner->username}}">
                        <div class="flex flex-col">
                            <div>
                                <a href="/{{$comment->owner->username}}" class="font-bold">{{$comment->owner->username}}</a>
                                {{$comment->body}}
                            </div>
                            <div class="mt-1 text-sm font-bold text-gray-400">
                                {{$comment->created_at->shortAbsoluteDiffForHumans()}}
                            </div>
                        </div>
                    </div>
                    <livewire:bean-comment :comment="$comment">
                </div>
                @endforeach
            </div>
            <div class="border-t-2"></div>
                <div class="m-2">
                    <div>
                        <livewire:beandby :post="$post"/>
                    </div>
                    <div class="flex mx-2 cursor-pointer">
                    <livewire:bean :post="$post"/>
                    <span class="mx-2" onclick="document.getElementById('comment').focus()">
                        <svg width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>comment-5</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-360.000000, -255.000000)" fill="#000000"> <path d="M390,277 C390,278.463 388.473,280 387,280 L379,280 L376,284 L373,280 L365,280 C363.527,280 362,278.463 362,277 L362,260 C362,258.537 363.527,257 365,257 L387,257 C388.473,257 390,258.537 390,260 L390,277 L390,277 Z M386.667,255 L365.333,255 C362.388,255 360,257.371 360,260.297 L360,277.187 C360,280.111 362.055,282 365,282 L371.639,282 L376,287.001 L380.361,282 L387,282 C389.945,282 392,280.111 392,277.187 L392,260.297 C392,257.371 389.612,255 386.667,255 L386.667,255 Z" id="comment-5" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
                    </span>
                    </div>
                </div>
                <div class="border-t-2 p-3"></div>
                {{-- Button --}}
                <form class="mx-3 mb-2"  action="/p/{{$post->slug}}/comment" method="POST">
                    <x-commentForm/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
