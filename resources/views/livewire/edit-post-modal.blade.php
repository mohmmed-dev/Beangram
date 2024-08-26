<div class="md:flex w-full max-h-screen md:flex-row gap-x-3">
        {{-- Left Side --}}
        <div class="flex justify-center items-center">
            <div class="relative">
                <livewire:image-slider :post="$post">
            </div>
        </div>
        {{-- Right Side --}}
        <div class="border-b-2 md:w-6/12 flex flex-col mx-1 justify-between">
                <div class="flex mt-5 justify-start items-center">
                    <div>
                        <img src="{{auth()->user()->image_profile('users/JCf7D6THq6foIKczwiKqkIIyRVD39F6jbUknqHjR.png')}}" class="w-16 h-16 rounded-full" alt="" />
                    </div>
                    <div class="mx-1">
                        <a href="/{{auth()->user()->username}}" class="boled">{{auth()->user()->username}}</a>
                    </div>
                </div>
                <div>
                    <textarea name="description" rows="5" class=" resize-none mt-5 w-full border focus:ring-lime-600 focus:border-lime-600 border-gray-200 hove rounded-xl" wire:model="description" placeholder="{{__("Write a description")}}">{{$post->description ?? ''}}</textarea>
                    <div>
                        @error('description')
                        <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                        <div class="mx-1">
                            <x-primary-button wire:click="update" class=" mr-auto"> {{__("Publish")}}</x-primary-button>
                        </div>
                </div>
        </div>
</div>
