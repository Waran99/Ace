<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProgramType extends Model
{
    protected $casts = [
        'start_date' => 'datetime:Y-m-d'
    ];
    function programSlots(){
        return $this->hasMany(ProgramSlot::class,'program_types_id');
    }


    function programtypeimgs(){
        return $this->hasMany(Programtypeimage::class,'program_type_id');
    }

    function club(){
        return $this->belongsTo(Club::class,'club_id');
    }
}



