<div class="relative">
    @if($post->file_type == 'image')
        @if ($this->file_count() >= 1)
            <button wire:click="nextOne()" class="absolute inset-y-0 right-0 text-slate-300  opacity-25 hover:opacity-100 hover:text-white px-3 text-3xl ease-in duration-300"><</button>
            <img src='{{$this->show_file($this->fileNum)}}' alt='{{$post->description}}' class="w-full h-80 ease-in duration-300">
            <button wire:click="previousOne()" class=" absolute inset-y-0 left-0  text-slate-300  opacity-25 hover:opacity-100  hover:text-white px-3 text-3xl ease-in duration-300">></button>
                <ul class=" p-0 my-2 flex flex-row-reverse transition-all gap-x-3 justify-center items-center absolute inset-x-0 bottom-0 ease-in duration-300">
                @for ($i = 0; $i <= $this->file_count(); $i++)
                @if($i == $this->fileNum)
                <li class="border-1 w-3 h-3 rounded-full bg-lime-500 ease-in duration-300"></li>
                @else
                <li class="border-2 w-3 h-3 rounded-full bg-transparent ease-in duration-300"></li>
                @endif
                @endfor
            </ul>
        @else
            <img src='{{$this->show_file($this->fileNum)}}' alt='{{$post->description}}' class="w-full h-80">
        @endif
    @else
        <video src="{{$this->show_file($this->fileNum)}}" class="w-full h-80" controls  poster></video>
    @endif
</div>
