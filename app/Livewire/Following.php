<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Following extends Component
{
    public $userId;
    protected $user;
    #[On('unfollowUser')]
    public function  getCountProperty()  {
        $this->user = User::find($this->userId);
        return $this->user->following()->wherePivot("confirmed" ,true)->count();
    }
    public function render()
    {
        return view('livewire.following');
    }
}
