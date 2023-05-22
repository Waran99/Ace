<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\BookingSlot;
use App\Models\Club;
//use App\Models\ProgramSlot;
//use App\Models\ProgramType;
use App\Models\ProgramSlot;
use App\Models\ProgramType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $customers = Customer::all();
        $clubs = Club::all();
        return view('admin.booking.create',['customers'=> $customers, 'clubs'=> $clubs]);
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
        $request->validate([
            'customer_id'=>'required|integer',
            'program_id'=>'required|integer',
            'slots'=>'required|array',
        ]);
        $booking = Booking::query()->create([
            'customer_id' => $request['customer_id'],
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

        return redirect('admin/booking')->with('success','Data has been added.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Check available program slots
    function available_programslots(Request $request,$start_date_slot){
        $aprogramslots=DB::SELECT("SELECT * FROM program_slots WHERE id NOT IN (SELECT program_slots_id FROM bookings WHERE'$start_date_slot' BETWEEN start_date_slot AND end_date_slot)");

//        $data=[];
//        foreach($aprogramslots as $programslot){
//            $ProgramTypes=ProgramType::find($programslot->progra,_type_id);
//            $data[]=['programslots'=>$room,'programtype'=>$roomTypes];
//        }
        return response()->json(['data'=>$aprogramslots]);
    }


    public function front_booking()
    {
        return view('front-booking');
    }
}


