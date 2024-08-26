<?php

namespace App\Livewire;

use Livewire\Component;

class Bean extends Component
{
    public $post;
    public function render()
    {
        return view('livewire.bean');
    }
    public function toggle_bean()
    {
        auth()->user()->beans()->toggle($this->post);
        $this->dispatch('beanToggle');
    }
}
