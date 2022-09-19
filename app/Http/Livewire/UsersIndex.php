<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{

    use WithPagination;

    protected $users;
    public $updateMode = false;

    protected $listeners = [
        'userStore' => 'handleUserStore', // <-- Add this line
        'userUpdated' => 'handleUserUpdated', // <-- Add this line
    ];

    public function render()
    {
        $this->users = User::latest()->paginate(5);
        return view('livewire.users-index', [
            'users' => $this->users
        ]);
    }

    public function handleUserStore($users) // <-- Add this line
    {
        session()->flash('success', 'User Created Successfully.'); // <-- Add this line
    }

    public function handleUserUpdated($users) // <-- Add this line
    {
        session()->flash('success', 'User Updated Successfully.'); // <-- Add this line
    }

    public function destroy($id){
        if($id){
            $record = User::find($id);
            $record->delete();
            session()->flash('success', 'User Deleted Successfully.');
        }
    }

    public function getUser($id) {
        $this->updateMode = true;
        $user = User::find($id);
        $this->emit('getUser', $user);
    }
}
