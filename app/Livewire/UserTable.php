<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $userId, $name, $email, $username, $phone, $address, $gender, $active;
    public $isEditing = false;
    public $isActive = null;

    public function mount() {}
    public function cancel()
    {
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->mount();
    }
    public function edit($id)
    {
        $this->isEditing = true;
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->gender = $user->gender;
        $this->active = $user->active;
    }
    public function store()
    {
        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'active' => $this->active,
        ]);

        $this->isEditing = false;
        $this->mount(); // Refresh users list
    }

    public function toggleActive()
    {
        $this->isActive = !$this->isActive;
    }
    public function showAll()
    {
        $this->isActive = null;
    }


    public function render()
    {
        $users = $this->isActive === null
            ? User::paginate(10)
            : User::where('active', $this->isActive)->paginate(10);

        return view('livewire.user-table', [
            'users' => $users
        ]);
    }
}
