<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Attributes\On;
use Livewire\Component;

class PostsList extends Component
{
    #[On('toggleFollow')]
    public function  getPostsProperty()  {
    $ids = auth()->user()->following()->wherePivot('confirmed', true)->get()->pluck('id');
    return post::whereIn('user_id',$ids)->latest()->get();
    }
    public function render()
    {
        return view('livewire.posts-list');
    }
}
