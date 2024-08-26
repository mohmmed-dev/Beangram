<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class PendingFollowersCount extends Component
{
    #[On('upDatetConfirm')]
    #[On('upDatetDelete')]
    public function getCountProperty() {
        return auth()->user()->pending_followers()->count();
    }
    public function render()
    {
        return view('livewire.pending-followers-count');
    }
}
