<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UsersUpdate extends Component
{

    public $name;
    public $email;
    public $user_id;

    protected $listeners = [
        'getUser' => 'showUser'
    ];

    public function showUser($user) {
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->user_id = $user['id'];
    }


    public function render()
    {
        return view('livewire.users-update');
    }
}
