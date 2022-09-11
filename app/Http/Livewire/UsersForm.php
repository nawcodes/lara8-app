<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersForm extends Component
{


    public $users;

    public function mount($users) {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.users-form');
    }
}
