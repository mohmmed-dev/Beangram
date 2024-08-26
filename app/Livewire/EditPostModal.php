<?php

namespace App\Livewire;

use App\Models\post;
use LivewireUI\Modal\ModalComponent;

class EditPostModal extends ModalComponent
{
    public post $post;
    public $description;
    public function mount(Post $post) {
        $this->post = $post;
        $this->description = $post->description;
    }
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
    public function update()  {
        $this->validate([
            'description' => 'required'
        ]);
        $this->post->update([
            'description' => $this->description
        ]);
        return redirect()->route('show_post',['post'=>$this->post->slug]);
    }
    public function render()
    {
        return view('livewire.edit-post-modal');
    }
}
