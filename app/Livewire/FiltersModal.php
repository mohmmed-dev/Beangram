<?php

namespace App\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;


class FiltersModal extends ModalComponent
{
    public $filters = ['Original','Clarendon' ,'Gingham','Moon','Perpetua'];
    public $images;
    public $save_images;
    public $filtered_image;
    public $temp_images;
    public $number = 0;
    public $description;
    #[On("add_temp_image")]

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function mount($images) {
        $this->save_images = $images;
        $this->images = $images;
        $this->filtered_image = $this->array_image();
        $this->add_temp_image($images);
    }

    public function array_image() {
        return $this->images[$this->number];
    }

    public function filter_original()  {
        $this->filtered_image = $this->save_images[$this->number];
        $this->images[$this->number] = $this->filtered_image;
        $this->dispatch('add_temp_image',$this->filtered_image);
    }

    public function filter_clarendon()  {
        $manager = new ImageManager(new Driver());
        $img = $manager->read(storage_path('App/public'). DIRECTORY_SEPARATOR .$this->array_image());
        $img->brightness(20)->contrast(15);
        $path =  DIRECTORY_SEPARATOR . Str::random(30).'.png';
        $img->toPng()->save(storage_path('App/public/temp') . $path);
        $this->filtered_image = 'temp' .  $path;
        $this->images[$this->number] = $this->filtered_image;
        $this->dispatch('add_temp_image',$this->filtered_image);
    }

    public function filter_gingham()  {
        $manager = new ImageManager(new Driver());
        $img = $manager->read(storage_path('App/public'). DIRECTORY_SEPARATOR .$this->array_image());
        $img->brightness(10)->contrast(5)->colorize(0,-10,-10);
        $path =  DIRECTORY_SEPARATOR . Str::random(30).'.png';
        $img->toPng()->save(storage_path('App/public/temp') . $path);
        $this->filtered_image = 'temp' .  $path;
        $this->images[$this->number] = $this->filtered_image;
        $this->dispatch('add_temp_image',$this->filtered_image);
    }

    public function filter_moon()  {
        $manager = new ImageManager(new Driver());
        $img = $manager->read(storage_path('App/public'). DIRECTORY_SEPARATOR .$this->array_image());
        $img->brightness(10)->contrast(5)->greyscale();
        $path =  DIRECTORY_SEPARATOR . Str::random(30).'.png';
        $img->toPng()->save(storage_path('App/public/temp') . $path);
        $this->filtered_image = 'temp' .  $path;
        $this->images[$this->number] = $this->filtered_image;
        $this->dispatch('add_temp_image',$this->filtered_image);
    }

    public function filter_perpetua()  {
        $manager = new ImageManager(new Driver());
        $img = $manager->read(storage_path('App/public'). DIRECTORY_SEPARATOR . $this->array_image());
        $img->brightness(-10)->colorize(-30,10,10);
        $path =  DIRECTORY_SEPARATOR . Str::random(30).'.png';
        $img->toPng()->save(storage_path('App/public/temp') . $path);
        $this->filtered_image = 'temp' .  $path;
        $this->images[$this->number] = $this->filtered_image;
        $this->dispatch('add_temp_image',$this->filtered_image);
    }
    public function  publish() {
        $this->validate([
            'description' => 'required'
        ]);
        $images = [];
        foreach ($this->images as $image) {
            $post_image = 'posts/' . Str::random(30) . '.jpeg';
            Storage::move('public/' . $image,'public/'.$post_image);
            array_push($images,$post_image);
        }
        $this->delete_temp_images();
        $post = auth()->user()->posts()->create([
            'description' => $this->description,
            'slug'=> Str::random(10),
            'file_type' =>  'image',
            'file' => json_encode($images)
        ]);
        $this->forceClose()->closeModal();
    }

    public function add_temp_image($images)  {
        foreach($images as $image) {
            $this->temp_images[] = 'public/' . $image;
        }
    }

    public function file_count() {
        return  count($this->images) - 1;
    }

    public function nextOne()  {
        if($this->file_count() > $this->number) {
            $this->number++;
            $this->filtered_image = $this->array_image();
            $this->dispatch('add_temp_image',$this->filtered_image);
        }
    }

    public function previousOne()  {
        if($this->number > 0) {
            $this->number--;
            $this->filtered_image = $this->array_image();
            $this->dispatch('add_temp_image',$this->filtered_image);
        }
    }
    public function chengImage($key)  {
        $this->number = $key;
        $this->filtered_image = $this->array_image();
        $this->dispatch('add_temp_image',$this->filtered_image);
    }

    public function delete_temp_images()  {
        Storage::delete($this->temp_images);
    }


    public function render()
    {
        return view('livewire.filters-modal');
    }
}
