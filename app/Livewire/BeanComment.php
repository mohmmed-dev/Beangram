<?php

namespace App\Livewire;

use Livewire\Component;

class BeanComment extends Component
{
    public $comment;
    public function render()
    {
        return view('livewire.bean-comment');
    }
       public function toggle_bean()
    {
        auth()->user()->beansComment()->toggle($this->comment);
        $this->dispatch('beanToggle');
    }
}
