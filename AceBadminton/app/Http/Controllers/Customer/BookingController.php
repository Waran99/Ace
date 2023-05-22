<?php

namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Club;
use App\Models\ProgramSlot;
use App\Models\ProgramType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class BookingController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function bookingsView()
    {
        return view('customer.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createBookingView()
    {
        $programs = ProgramType::all();
        $clubs = Club::all();
        return view('customer.booking.create',['clubs'=> $clubs, 'programs'=> $programs]);
    }

    public function getPrograms(Request $request)
    {
        $validated = $request->validate([
            'club_id'=>'required',
        ]);
        $club = Club::query()->where('id', $validated['id'])->with('programTypes.programSlots')->first();
        return response($club);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {

        try {
            $request->validate([
                'program_id'=>'required',
                'slots'=>'required|array',
            ]);
            $booking = Booking::query()->create([
                'customer_id' => auth()->guard('customer')->id(),
            ]);
            if($booking !== null){
                $program = ProgramType::query()->where('id', $request['program_id'])->first();
                if($program !== null ){
                    foreach ($request['slots'] as $slot){
                        $programSlot = ProgramSlot::query()->where('id', $slot)->first();
                        if($programSlot !== null){
                            BookingSlot::query()->create([
                                'booking_id' => $booking->id,
                                'slot_id' => $programSlot->id,
                                'title' => $program->title,
                                'price' => $program->price,
                                'date' => $programSlot->date,
                                'start_time' => $programSlot->start_time,
                                'end_time' => $programSlot->end_time
                            ]);
                        }
                    }
                }
            }


            return redirect('customer/bookings')->with('success','Data is added.');
        }catch (\Exception $exception){
            info($exception->getMessage());
        }
    }


    public function successView(Request $request)
    {
        $checkoutSession = auth('customer')->user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));

































































































































































































        return view('customer.booking.success', ['checkoutSession' => $checkoutSession]);
//        return view('customer.booking.success');
    }
    public function cancelView()
    {
        return view('customer.booking.failure');
    }
}


