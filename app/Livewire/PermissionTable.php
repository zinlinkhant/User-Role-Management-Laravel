<?php

namespace App\Livewire;

use App\Models\Feature;
use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionTable extends Component
{
    use WithPagination;

    public $editMode = false;
    public $editingPermission;
    public $name;
    public $feature_id;
    public $features; // List of features for editing

    protected $rules = [
        'name' => 'required|string|max:255',
        'feature_id' => 'required|exists:features,id',
    ];

    public function mount()
    {
        $this->features = Feature::all();
    }

    public function edit(Permission $permission)
    {
        $this->editMode = true;
        $this->editingPermission = $permission;
        $this->name = $permission->name;
        $this->feature_id = $permission->feature_id;
    }

    public function update()
    {
        $this->validate();

        $this->editingPermission->update([
            'name' => $this->name,
            'feature_id' => $this->feature_id,
        ]);

        session()->flash('message', 'Permission updated successfully.');

        $this->reset(['editMode', 'name', 'feature_id', 'editingPermission']);
    }

    public function delete(Permission $permission)
    {
        $permission->delete();

        session()->flash('message', 'Permission deleted successfully.');
    }

    public function render()
    {
        return view('livewire.permission-table', [
            'permissions' => Permission::paginate(10),
        ]);
    }
}
