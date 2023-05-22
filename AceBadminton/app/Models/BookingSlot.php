<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSlot extends Model
{
    protected $table = 'booking_slots';
    protected $primaryKey = 'id';
    protected $fillable = [
        'booking_id',
        'slot_id',
        'title',
        'price',
        'date',
        'start_time',
        'end_time',
        'title',
    ];

    protected $casts = [
        'price' => 'double',
    ];
}
