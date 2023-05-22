<?php

namespace App\Http\Livewire;
use App\Models\ProgramSlot;
use App\Models\ProgramType;
use Livewire\Component;

class AdminBooking extends Component
{
    public $customer_id = null;
    public $club_id = null;
    public $program_id = null;
    public $clubs = [];
    public $customers = [];
    public $date = null;
    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        $programs = ProgramType::query()->where('club_id', $this->club_id)->get();
        if($this->date !== null){
            $slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->where('date', $this->date)->get();
        }else{
            $slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->get();
        }

        return view('livewire.admin-booking', [
            'programs' => $programs,
            'slots' => $slots
        ]);
    }
}
