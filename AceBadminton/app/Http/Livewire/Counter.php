<?php

namespace App\Http\Livewire;

use App\Models\Club;
use App\Models\ProgramType;
use Livewire\Component;

class Counter extends Component
{

    public $programs = [];
    public $query = '';

    public function render()
    {
        $this->programs = ProgramType::query()->where('title', 'LIKE', '%' . $this->query .'%' )->get();
        return view('livewire.counter');
    }

//    public function sort()
//    {
//        return view('livewire.counter', [
//            'programs' => ProgramType::where('location', 'LIKE', '%' . $this->search .'%' )->get(),
//        ]);
//    }




}
