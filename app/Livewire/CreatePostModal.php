<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreatePostModal extends ModalComponent
{
    use WithFileUploads;
    #[Validate(['images.*'=> 'image|max:1024'])]
    public $images;
    public function save_temp() {
        if(count($this->images) > 5) {
            return $this->addError("Allowed Limit 5" ,"الحد المسموح 5 صور");
        };
        $images = [];
        foreach($this->images as $image) {
            $path =  $image->store('temp', 'public');
            array_push($images,$path);
        }
        $this->dispatch('openModal','filters_modal',['images' => $images]);
    }

    public function render()
    {
        return view('livewire.create-post-modal');
    }
}
