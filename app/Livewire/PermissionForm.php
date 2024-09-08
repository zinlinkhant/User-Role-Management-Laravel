<?php

namespace App\Livewire;

use Livewire\Component;

class PermissionForm extends Component
{
    public $createPermission = true;
    public function toggleCreate()
    {
        $this->createPermission = !$this->createPermission;
    }
    public function render()
    {
        return view('livewire.permission-form');
    }
}