<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ProgramType;
use App\Models\ProgramSlot;
use Illuminate\Http\Request;

class ProgramSlotController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $programtypes=ProgramType::query()->with('club')->get();
        $data=ProgramSlot::all();
        return view('admin.ProgramSlot.index',['data'=>$data,'programtypes'=>$programtypes]);
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
        return view('admin.ProgramSlot.create',['programtypes'=>$programtypes]);
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

        return redirect('admin/ProgramSlot/create')->with('success','Data has been added.');

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
        return view('admin.ProgramSlot.show',['data'=>$data, 'programtypes'=>$programtypes]);


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
        return view('admin.ProgramSlot.edit',['data'=>$data, 'programtypes'=>$programtypes]);
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

        return redirect('admin/ProgramSlot/'.$id.'/edit')->with('success','Data has been added updated.');
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
        return redirect('admin/ProgramSlot')->with('success','Data has been deleted.');
    }
}
