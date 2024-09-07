<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Role_Permission;
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
        'roleUpdated' => '$refresh',
        'roleDeleted' => '$refresh',
    ];

    public function mount()
    {
        $this->roles = Role::all();
        $this->allPermissions = Permission::all();
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->permissionsSelected = $role->permissions->pluck('id')->toArray();
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = Role::find($this->roleId);

        // Update role name
        $role->update([
            'name' => $this->name,
        ]);

        // Sync the permissions
        // This will attach the permissions that are in permissionsSelected
        // and detach those that are not in permissionsSelected
        $role->permissions()->sync($this->permissionsSelected);

        session()->flash('message', 'Role updated successfully.');
        $this->editMode = false;
        $this->dispatch('roleUpdated');
    }

    public function permissionsSelected($permissionId)
    {
        if (in_array($permissionId, $this->permissionsSelected)) {
            // Remove permission if it's already selected
            $this->permissionsSelected = array_diff($this->permissionsSelected, [$permissionId]);
        } else {
            // Add permission if it's not selected
            $this->permissionsSelected[] = $permissionId;
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $this->dispatch('roleDeleted');
    }

    public function render()
    {
        return view('livewire.role-table');
    }
}