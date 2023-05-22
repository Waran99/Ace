<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'payment_id'
    ];

    function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    function bookingSlots()
    {
        return $this->hasMany(BookingSlot::class, 'booking_id');
    }
}
