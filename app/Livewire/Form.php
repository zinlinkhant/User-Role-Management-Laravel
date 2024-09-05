<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    public $create = true;
    public $btnText = "user create hide";
    function toggleCreate()
    {
        $this->create = !$this->create;
        if ($this->create) {
            $this->btnText = "user create hide";
        } else {
            $this->btnText = "user create show";
        }
    }
    function mount() {}
    public function render()
    {
        return view('livewire.form');
    }
}