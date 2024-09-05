<?php


namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
    public $error = null;

    public function increment()
    {
        $this->count++;
        $this->error = null; // Clear any previous errors
    }

    public function decrement()
    {
        if ($this->count <= 0) {
            $this->error = "Number cannot be less than zero";
            return;
        }
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
