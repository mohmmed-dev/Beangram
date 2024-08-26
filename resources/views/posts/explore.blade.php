<x-app-layout>

    <div class="grid grid-cols-3 gap-2 md:gap-5 my-2">
    @foreach ($posts as $post)
    <div class="">
        <a href="/p/{{$post->slug}}" class="w-full h-full">
        <div>
            <livewire:image-slider :post="$post">
            </div>
        </a>
    </div>
    @endforeach
    </div>
    <div class="py-3">
        {{$posts->links()}}
    </div>
</x-app-layout>
