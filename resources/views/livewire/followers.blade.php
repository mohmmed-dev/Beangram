<div>
    <button  onclick="Livewire.dispatch('openModal', { component: 'followers-modal', arguments: { userId: {{ $userId }} }})">
        <strong>{{$this->Count}}</strong> {{__("Followers")}}
    </button>
</div>
