<?php

namespace App\Livewire;

use App\Models\Feature;
use Livewire\Component;

class FeatureCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:features,name',
    ];

    public function store()
    {
        $this->validate();

        Feature::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Feature created successfully.');

        $this->reset('name');
        $this->dispatch('featureCreated');
    }

    public function render()
    {
        return view('livewire.feature-create');
    }
}
