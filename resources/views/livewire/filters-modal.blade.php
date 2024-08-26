
    <div class="md:flex w-full max-h-screen md:flex-row gap-x-2">
        {{-- Left Side --}}
        <div class="md:w-8/12 bg-w flex flex-col justify-evenly">
            <div class="flex-1 bg-black flex items-center">
                <img src="{{asset('/storage/'.$this->filtered_image)}}"class="w-full">
            </div>
        <div class="grid grid-cols-5 md:grid-cols-3 gap-x-1 w-full align-center justify-start bg-black">
            @if ($this->file_count() >= 1)
                @foreach ($this->images as $kay => $value)
                <img src="{{asset('/storage/'.$value)}}" class="h-28 col-span-1" id="{{$kay}}" wire:click="chengImage({{$kay}})">
            @endforeach
            @endif
        </div>
        </div>
        {{-- Right Side --}}
        <div class="border-b-2 md:w-6/12 flex flex-col justify-between">
            <div class="mx-2 mt-3">
                <h1 class="mb-2 text-xl">{{__("Filters")}}</h1>
                <div class="grid grid-cols-3">
                    @foreach ($filters as $filter)
                    <div class=" w-16 text-center col-span-1">
                        <img src="{{asset('/storage/filters_images/'. $filter .'.jpg')}}" alt="{{$filter}}" wire:click="filter_{{strtolower($filter)}}">
                        <p>{{__($filter)}}</p>
                    </div>
                    @endforeach
                    </div>
            </div>
            <div class="flex flex-col justify-between">
                <div class="flex mt-5 justify-start items-center">
                    <div>
                        {{-- auth()->user()->image --}}
                        <img src="{{auth()->user()->image_profile('users/JCf7D6THq6foIKczwiKqkIIyRVD39F6jbUknqHjR.png')}}" class="w-16 h-16 rounded-full" alt="" />
                    </div>
                    <div class="mx-1">
                        <a href="/{{auth()->user()->username}}" class="boled">{{auth()->user()->username}}</a>
                    </div>
                </div>
                <div>
                    <textarea name="description" rows="5" class=" mx-1 resize-none mt-5 w-full border focus:ring-lime-600 focus:border-lime-600 border-gray-200 hove rounded-xl" wire:model="description" placeholder="{{__("Write a description")}}">{{$post->description ?? ''}}</textarea>
                    <div>
                        @error('description')
                        <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                        <div class="mx-1">
                            <x-primary-button wire:click="publish" class=" mr-auto"> {{__("Publish")}}</x-primary-button>
                        </div>
                </div>
        </div>
    </div>
