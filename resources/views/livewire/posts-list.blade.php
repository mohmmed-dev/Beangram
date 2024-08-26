<div class="w-[60rem]">
    @forelse ($this->posts as $post)
        <livewire:post :post="$post" :wire:key="'post-'.$post->id" />
    @empty
    <div class="mt-10 text-center">
        {{__("Nothing")}}
    </div>
    @endforelse
</div>

