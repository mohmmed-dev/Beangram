<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $searchInput = '';
    public $results = [];

    public function  goto($usernaem)  {
        return redirect()->route('user_profile',['user' => $usernaem]);
    }

    public function render()
    {
        $this->results = [];
        $this->results = User::where('username', "LIKE", '%' . $this->searchInput . '%')->get(['id','name','username','image']);
        return view('livewire.search',[
            'results' => $this->results
        ]);
    }
}
