<?php

namespace App\Livewire;

use App\Models\Feature;
use App\Models\Permission;
use Livewire\Component;

class PermissionCreate extends Component
{
    public $name;
    public $feature_id;
    public $features; // List of features for the dropdown

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions,name',
        'feature_id' => 'required|exists:features,id',
    ];

    public function mount()
    {
        // Initialize features in mount method
        $this->features = Feature::all();
    }

    public function store()
    {
        $this->validate();

        Permission::create([
            'name' => $this->name,
            'feature_id' => $this->feature_id,
        ]);

        session()->flash('message', 'Permission created successfully.');

        // Reset the input fields
        $this->reset(['name', 'feature_id']);
    }

    public function render()
    {
        return view('livewire.permission-create');
    }
}
