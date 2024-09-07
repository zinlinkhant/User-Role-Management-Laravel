<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ];

    public function store()
    {
        $this->validate($this->rules);
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User created successfully.');
        $this->dispatch('userCreated');

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'username', 'email', 'password']);
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
