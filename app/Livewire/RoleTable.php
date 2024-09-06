<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class RoleTable extends Component
{

    public $roles;
    public $editMode = false;
    public $roleId;
    public $name;
    public $permissions;
    public $permissionsSelected = [];
    public $allPermissions;
    protected $listeners = [
        'roleCreated' => '$refresh',
        'roleDeleted' => '$refresh'
    ];

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->permissionsSelected = $role->permissions->pluck('id')->toArray();
        $this->editMode = true;
        $this->permissions = $role->permissions;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $this->roleId,
        ]);

        $role = Role::find($this->roleId);
        $role->update([
            'name' => $this->name,
        ]);

        $role->permissions()->sync($this->permissionsSelected);

        $this->editMode = false;
        session()->flash('message', 'Role updated successfully.');
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $this->dispatch('roleDeleted');
    }
    public function mount()
    {
        $this->roles = Role::all();
        $this->allPermissions = Permission::all();
    }
    public function render()
    {
        return view('livewire.role-table');
    }
}
