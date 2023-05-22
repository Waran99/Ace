<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class Customer extends Authenticatable
{
    use Notifiable, Billable;

    function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
