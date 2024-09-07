<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $userId, $name, $email, $username, $phone, $address, $gender, $active, $role_id;
    public $isEditing = false;
    public $isActive = null;
    protected $listeners = ['userCreated' => '$refresh', 'userUpdated' => '$refresh', 'userDeleted' => '$refresh'];
    public $roles;


    public function mount()
    {
        $this->roles = Role::all();
    }
    public function cancel()
    {
        $this->isEditing = false;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $this->mount();
        $this->dispatch('userDeleted');
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
        $this->role_id = $user->role_id;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->userId),
            ],
            'username' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:0,1',
            'active' => 'boolean',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'active' => $this->active,
            'role_id' => $this->role_id,
        ]);


        $this->isEditing = false;
        $this->reset(); // Clear form fields
        $this->dispatch('userUpdated');
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
