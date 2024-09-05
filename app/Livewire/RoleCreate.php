<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
    ];

    public function store()
    {
        $this->validate();

        Role::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Role created successfully.');

        $this->reset('name');
    }

    public function render()
    {
        return view('livewire.role-create');
    }
}