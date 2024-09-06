<?php

namespace App\Livewire;

use App\Models\Feature;
use Livewire\Component;
use Livewire\WithPagination;

class FeatureTable extends Component
{
    use WithPagination;

    public $editMode = false;
    public $editingFeature;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:features,name',
    ];

    protected $listeners = ['featureCreated' => '$refresh', 'featureUpdated' => '$refresh', 'featureDeleted' => '$refresh'];

    public function edit(Feature $feature)
    {
        $this->editMode = true;
        $this->editingFeature = $feature;
        $this->name = $feature->name;
    }

    public function update()
    {
        $this->validate();

        $this->editingFeature->update([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Feature updated successfully.');

        $this->reset(['editMode', 'name', 'editingFeature']);
        $this->dispatch('featureUpdated'); // Emit event to refresh the component
    }

    public function delete(Feature $feature)
    {
        $feature->delete();

        session()->flash('message', 'Feature deleted successfully.');
        $this->dispatch('featureDeleted'); // Emit event to refresh the component
    }

    public function render()
    {
        return view('livewire.feature-table', [
            'features' => Feature::paginate(10),
        ]);
    }
}