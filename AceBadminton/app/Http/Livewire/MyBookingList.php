<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class MyBookingList extends Component
{
    public $bookings = [];
    public function render()
    {
        $this->bookings = Booking::query()->where('customer_id', auth()->guard('customer')->id())->with('bookingSlots')->get();
        foreach($this->bookings as $booking){
            if($booking->payment_id !== '' && $booking->payment_id !== null){
//                info($booking->payment_id);
                $session = auth('customer')->user()->stripe()->checkout->sessions->retrieve($booking->payment_id);
                if($session !== null){
                    if($session['payment_status'] === 'paid'){
                        $booking['payment_status'] = 'PAID';
                    }else{
                        $booking['payment_status'] = 'FAILED';
                    }
                }else{
                    $booking['payment_status'] = 'PENDING';
                }
            }else{
                $booking['payment_status'] = 'PENDING';
            }
        }
        return view('livewire.my-booking-list');
    }
}
