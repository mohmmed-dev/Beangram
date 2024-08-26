<div>
    @if($follow_state == 'Panding')
        <span class="text-gray-500">Panding</span>
    @else
    <button wire:click="toggle_follow" class="{{$classes}} {{$follow_state == 'Unfollow' ? 'text-red-500' : 'text-blue-500' }} ease-in duration-300" >
        {{__($follow_state)}}
    </button>
    @endif
</div>
