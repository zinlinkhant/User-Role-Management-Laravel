<?php

namespace App\Livewire;

use Livewire\Component;

class RoleForm extends Component
{
    public $btnCon = "show";
    public function toggleBtn()
    {
        if ($this->btnCon == "show") {
            $this->btnCon = "hide";
        } else {
            $this->btnCon = "show";
        }
    }
    public function render()
    {
        return view('livewire.role-form');
    }
}
