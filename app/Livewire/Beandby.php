<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Beandby extends Component
{
    public $post;
    #[On('beanToggle')]
    public function getbeansProperty() {
        return $this->post->beans()->count();
    }
    public function getFirstusernameProperty() {
        return $this->post->beans()->first()->username;
    }
    public function render()
    {
        return view('livewire.beandby');
    }
}
