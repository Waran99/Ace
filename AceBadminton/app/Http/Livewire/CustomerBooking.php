<?php

namespace App\Http\Livewire;
use App\Models\Club;
use App\Models\ProgramSlot;
use App\Models\ProgramType;
use Livewire\Component;

class CustomerBooking extends Component
{
    public $club_id = null;
    public $program_id = null;

    public $date = null;

    public $clubs = [];
    public $program = null;
    public $slot = [];

    protected $queryString = ['program_id'];

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        $this->program = ProgramType::query()->where('id', $this->program_id)->with('club')->first();
        if($this->date !== null){
            $this->slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->where('date', $this->date)->get();
        }else{
            $this->slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->get();
        }

        return view('livewire.customer-booking');
    }
}
