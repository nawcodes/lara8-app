<?php

namespace App\Http\Livewire;

use App\Models\User;
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


    public function update() {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $this->resetInputFields();
            $this->emit('userUpdated', $user);
        }
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
    }



    public function render()
    {
        return view('livewire.users-update');
    }
}
