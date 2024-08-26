<div>
    {{-- {{$user->following()->wherePivot('confirmed',true)->count()}} --}}
    <strong>{{$this->count}}</strong>
<button onclick="Livewire.dispatch('openModal', { component: 'following-modal', arguments: { userId: {{ $userId }} }})"> {{__("Following")}}</button>
</div>
