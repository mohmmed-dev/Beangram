<?php

namespace App\Livewire;

use Livewire\Component;

class ImageSlider extends Component
{
    public $post;
    public $file;
    public $fileNum = 0;
    public function mount() {
        $this->file = $this->post->files();
    }
    public function file_count() {
        $arr = array_keys($this->file);
        return  end($arr);
    }
    public function show_file($num) {
    return $this->post->post_image($this->file[$num]);
    }
    public function nextOne()  {
        if($this->file_count() > $this->fileNum) {
            return $this->fileNum++;
        }
    }
    public function previousOne()  {
        if($this->fileNum > 0) {
            return $this->fileNum--;
        }
    }
    public function render()
    {
        return view('livewire.image-slider');
    }
}
