<div class="text-center py-3">
    <div class="flex m-2">
    <h1 class="flex-1">{{__('Crate New Post')}} </h1>
    @if ($images)
    <button class="w-fit text-lime-600 mx-2" wire:click="save_temp">{{__('Next')}}</button>
    @endif
</div>

@if ($images)
    <div class="grid grid-cols-3 items-center gap-3">
    @foreach ($images as $image)
        <img class="w-full h-28" src="{{$image->temporaryUrl()}}" alt="">
    @endforeach
    </div>
    <div>
        @if ($errors->has('Allowed Limit 5'))
        <p class="text-red-500">{{$errors->first("Allowed Limit 5")}}</p>
        @endif
    </div>
    @endif
    @if (!$images)
    <div class="py-2">
        <div class="text-md">
            {{__("Select file")}}
        </div>
    <div class=" text-center md:flex gap-x-4 justify-center items-center">
        <div class="my-3">
        <input type="file" class="hidden" id="fileInput" name="images[]" wire:model='images' multiple max="5">
            <x-primary-button onclick="document.getElementById('fileInput').click()"> {{__("New Image")}}</x-primary-button>
        </div>
        <div class="my-3">
            <input type="file" class="hidden" id="file"  wire:model='video' wire:model="video">
            <x-primary-button  onclick="Livewire.dispatch('openModal', { component: 'video-modal'})"> {{__("New Video")}}</x-primary-button>
        </div>
    </div>
    </div>
    @endif
</div>
