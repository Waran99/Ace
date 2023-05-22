<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Programs extends Component
{
    public $count = 0;

    public function increment()
    {
        info('incrementing');
        $this->count++;
    }
    public function render()
    {
        return view('livewire.programs');
    }
}
