<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersForm extends Component
{


    protected $users;
    public $name;
    public $email;
    public $role;

    public function mount($users) {
        $this->users = $users;
    }

    public function store() {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password'),
            'role' => $this->role,
        ]);

        session()->flash('message', 'User Created Successfully.');

        $this->resetInputFields();

        $this->emit('userStore', $user); // Close model to using to jquery
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->role = '';
    }

    public function render()
    {
        return view('livewire.users-form');
    }
}
