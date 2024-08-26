<?php

namespace App\Livewire;

use  Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class VideoModal extends ModalComponent
{
    use WithFileUploads;

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function render()
    {
        return view('livewire.video-modal');
    }

    public function  publish() {
        $this->forceClose()->closeModal();
    }
}
