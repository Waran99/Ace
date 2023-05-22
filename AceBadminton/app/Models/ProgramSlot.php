<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSlot extends Model
{
    protected $appends = ['available_slots'];

    function ProgramType(){
        return $this->belongsTo(ProgramType::class,'program_types_id');
    }

    public function getAvailableSlotsAttribute($value)
    {
        return $this->no_slot - BookingSlot::query()->where('slot_id', $this->id)->get()->count();
    }
}
