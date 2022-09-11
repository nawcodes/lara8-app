<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersIndex extends Component
{

    public $users;


    public function render()
    {
        $this->users = User::latest()->get();
        return view('livewire.users-index');
    }
}
