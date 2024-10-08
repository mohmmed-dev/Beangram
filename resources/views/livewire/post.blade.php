<div class="card overflow-hidden">
    <div class="card-header border border-b-1 ">
        <img src="{{$post->owner->image_profile($post->owner->image)}}" alt="{{$post->owner->usename}}" class="rounded-full  w-12 h-12">
        <a href="/{{$post->owner->username}}" class="bold mx-2">{{$post->owner->username}}</a>
    </div>
    <div class="card-body">
        <div class="relative">
            <livewire:image-slider :post="$post">
        </div>
        <div class="flex m-3">
            <livewire:bean :post="$post"/>
            <a href="/p/{{$post->slug}}" class="mx-1">
            <svg width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>comment-5</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-360.000000, -255.000000)" fill="#000000"> <path d="M390,277 C390,278.463 388.473,280 387,280 L379,280 L376,284 L373,280 L365,280 C363.527,280 362,278.463 362,277 L362,260 C362,258.537 363.527,257 365,257 L387,257 C388.473,257 390,258.537 390,260 L390,277 L390,277 Z M386.667,255 L365.333,255 C362.388,255 360,257.371 360,260.297 L360,277.187 C360,280.111 362.055,282 365,282 L371.639,282 L376,287.001 L380.361,282 L387,282 C389.945,282 392,280.111 392,277.187 L392,260.297 C392,257.371 389.612,255 386.667,255 L386.667,255 Z" id="comment-5" sketch:type="MSShapeGroup"> </path> </g> </g> </g></svg>
            </a>
        </div>
        <div class="px-4 py-2 cursor-pointer">
            <a href="{{$post->owner->username}}" class="font-bold mr-1">{{$post->owner->username}}</a>
            <p class="mt-3">{{$post->description}}</p>
        </div>
        <div class="my-2">
            @if ($post->comments()->count() > 0)
            <a href="/p/{{$post->slug}}" class="p-3 font-bold text-sm text-gray-500">
                {{__("View All Comments")}} {{$post->comments()->count()}}</a>
            @endif
            <span class="px-4 py-2">
                {{$post->created_at->diffForHumans()}}
            </span>
        </div>
    </div>
    <div class="card-footer border-t-2">
        <form action="/p/{{$post->slug}}/comment" method="POST">
            <x-commentForm/>
        </form>
    </div>
</div>
