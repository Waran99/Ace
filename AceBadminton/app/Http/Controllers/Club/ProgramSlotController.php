<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ProgramType;
use App\Models\ProgramSlot;
use Illuminate\Http\Request;

class ProgramSlotController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $programTypes = ProgramType::query()->where('club_id', auth()->guard('club')->id())->with('club')->get()->pluck('id');
        $data = ProgramSlot::query()->whereIn('program_types_id', $programTypes)->get();

        return view('club.ProgramSlot.index',['data' => $data, 'programtypes' => $programTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $programtypes=ProgramType::query()->with('club')->get();
        info($programtypes);
        return view('club.ProgramSlot.create',['programtypes'=>$programtypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new ProgramSlot;
        $data->program_types_id=$request->pt_id;
        $data->title=$request->title;
        $data->start_time=$request->start_time;
        $data->end_time=$request->end_time;
        $data->date=$request->select_date;
        $data->no_slot=$request->no_slot;
        $data->save();

        return redirect('club/ProgramSlot/create')->with('success','Data has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programtypes=ProgramType::query()->with('club')->get();
        $data=ProgramSlot::find($id);
        return view('club.ProgramSlot.show',['data'=>$data, 'programtypes'=>$programtypes]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programtypes=ProgramType::query()->with('club')->get();
//        info($programtypes);
        $data=ProgramSlot::find($id);
        return view('club.ProgramSlot.edit',['data'=>$data, 'programtypes'=>$programtypes]);
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
        $data=ProgramSlot::find($id);
        $data->program_types_id=$request->pt_id;
        $data->title=$request->title;
        $data->start_time=$request->start_time;
        $data->end_time=$request->end_time;
        $data->date=$request->select_date;
        $data->no_slot=$request->no_slot;
        $data->save();

        return redirect('club/ProgramSlot/'.$id.'/edit')->with('success','Data has been added updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProgramSlot::where('id',$id)->delete();
        return redirect('club/ProgramSlot')->with('success','Data has been deleted.');
    }
}
