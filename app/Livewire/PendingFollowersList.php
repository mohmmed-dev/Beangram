<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class PendingFollowersList extends Component
{
    protected $follower;
    public function confirm($id) {
        $this->follower = User::find($id);
        auth()->user()->confirm($this->follower);
        $this->dispatch('upDatetConfirm');
    }
    public function delete($id) {
        $this->follower = User::find($id);
        auth()->user()->deleteFollower($this->follower);
        $this->dispatch('upDatetDelete');
    }
    public function render()
    {
        return view('livewire.pending-followers-list');
    }
}
