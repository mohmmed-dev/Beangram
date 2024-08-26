<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowButton extends Component
{
    public $post;
    public $userId;
    protected $user;
    public $classes;
    public $follow_state;
    public function mount() {
        $this->user = User::find($this->userId);
         $this->set_follow_is_state();
    }
    public function  toggle_follow() {
        $this->user = User::find($this->userId);
        auth()->user()->toggle_follow($this->user);
        $this->set_follow_is_state();
        // $this->dispatch('toggleFollow');
    }
    public function set_follow_is_state()  {
        if(auth()->user()->is_panding($this->user)) {
            $this->follow_state = "Panding";
        } elseif(auth()->user()->is_following($this->user)) {
            $this->follow_state = "Unfollow";
        } else {
            $this->follow_state = "Follow";
        }
        $this->dispatch('toggleFollow');
    }
    public function render()
    {
        return view('livewire.follow-button');
    }
}
