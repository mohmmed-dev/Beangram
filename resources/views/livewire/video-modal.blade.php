<div class="  p-10">
    <form action="/p/create" class="w-full" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl" type="file"  name="file" id="file" >
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">MP4</p>
        <div>
            @error('file')
                <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
                    {{$message}}
                </div>
            @enderror
        </div>
        <textarea name="description" wire:model="description" rows="5" class="resize-none mt-10 w-full focus:ring-lime-600 focus:border-lime-600 border border-gray-200 hove rounded-xl" placeholder="{{__("Write a description")}}">{{$post->description ?? ''}}</textarea>
        <div>
            @error('description')
                <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
                    {{$message}}
                </div>
            @enderror
        </div>
        <x-primary-button class="mt-4 mr-auto">{{__("Publish")}}</x-primary-button>
    </form>
</div>
