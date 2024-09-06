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
        // Initialize permissions in mount method
        $this->permissions = Permission::all();
    }

    // Add permission ID to array when selected
    public function addPermission($id)
    {
        if (!in_array($id, $this->perId)) {
            array_push($this->perId, $id);
        }
    }

    // Assign selected permissions to the newly created role
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
        $this->validate();

        // Create role and store it
        $role = Role::create([
            'name' => $this->name,
        ]);

        // Add permissions to the role
        $this->addPermissionToTable($role->id);

        $this->dispatch(event: 'roleCreated');
        session()->flash('message', 'Role created successfully.');

        // Reset the input fields and permission selection
        $this->reset(['name', 'perId']);
    }

    public function render()
    {
        return view('livewire.role-create');
    }
}
