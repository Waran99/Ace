<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\ProgramSlot;
use App\Models\ProgramType;
use Livewire\Component;

class ClubBooking extends Component
{
    public $customer_id = null;
    public $program_id = null;
    public $clubs = [];
    public $customers = [];
    public $date = null;
    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        $programs = ProgramType::query()->where('club_id', auth()->guard('club')->id())->get();
        if($this->date !== null){
            $slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->where('date', $this->date)->get();
        }else{
            $slots = ProgramSlot::query()->where('program_types_id', $this->program_id)->get();
        }

        $customers = Customer::query()->get();
        return view('livewire.club-booking', [
            'customers' => $customers,
            'programs' => $programs,
            'slots' => $slots
        ]);
    }
}
