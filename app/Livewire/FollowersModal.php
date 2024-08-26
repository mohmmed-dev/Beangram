<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class FollowersModal extends ModalComponent
{
    public $userId;
    private $user;
    public function getFollowersListProperty() {
        $this->user = User::find($this->userId);
        return $this->user->followers()->wherePivot('confirmed', true)->get();
    }
    public function BackFollow($userId) {
        $followers_user = User::find($userId);
        $this->user = User::find($this->userId);
        $this->user->follow($followers_user);
    }
    public function render()
    {
        return view('livewire.followers-modal');
    }
}
