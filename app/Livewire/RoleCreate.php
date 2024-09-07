<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Role_Permission;
use Livewire\Component;

class RoleCreate extends Component
{
    public $name;
    public $permissions;
    public $perId = [];

    protected $rules = [
        'name' => 'required|string|max:255|unique:roles,name',
    ];

    public function mount()
    {
        $this->permissions = Permission::all();
    }

    public function addPermission($id)
    {
        if (!in_array($id, $this->perId)) {
            array_push($this->perId, $id);
        }
    }

    public function addPermissionToTable($roleId)
    {
        foreach ($this->perId as $id) {
            Role_Permission::create([
                'role_id' => $roleId,
                'permission_id' => $id,
            ]);
        }
    }

    public function store()
    {
        $this->validate($this->rules);

        $role = Role::create([
            'name' => $this->name,
        ]);

        $this->addPermissionToTable($role->id);

        $this->dispatch(event: 'roleCreated');
        session()->flash('message', 'Role created successfully.');

        $this->reset(['name', 'perId']);
        $this->dispatch('roleCreated');
    }

    public function render()
    {
        return view('livewire.role-create');
    }
}
