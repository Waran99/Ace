<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ProgramType;
use App\Models\Programtypeimage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data=ProgramType::all();
        return view('admin.ProgramTypes.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $club=Club::all();
        return view('admin.ProgramTypes.create',['club' => $club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|Factory|View
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'detail'=>'required',
        ]);

        $data=new ProgramType;
        $data->club_id=$request->club_id;
        $data->title=$request->title;
        $data->location=$request->location;
//        $data->duration=$request->duration;
//        $data->start_date=$request->start_date;
//        $data->end_date=$request->end_date;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->facility_1=$request->facility_1;
        $data->facility_2=$request->facility_2;
        $data->save();

        foreach($request->file('imgs') as $img){
            $path = Storage::disk('public')->put('programs', $img);
            $imgData=new Programtypeimage;
            $imgData->program_type_id=$data->id;
            $imgData->img_src=$path;
            $imgData->img_alt=$request->title;
            $imgData->save();
        }

        return redirect('admin/ProgramTypes/create')->with('success','Data has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {

        $data=ProgramType::find($id);
        return view('admin.ProgramTypes.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {


        $club=Club::all();
        $data=ProgramType::find($id);
        return view('admin.ProgramTypes.edit',['data'=>$data,'club' => $club]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function update(Request $request, $id)
    {
        $data=ProgramType::find($id);
        $data->club_id=$request->club_id;
        $data->title=$request->title;
        $data->location=$request->location;
//        $data->duration=$request->duration;
//        $data->start_date=$request->start_date;
        $data->price=$request->price;
        $data->detail=$request->detail;
        $data->facility_1=$request->facility_1;
        $data->facility_2=$request->facility_2;
        $data->save();

        if($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $img) {
                $path = Storage::disk('public')->put('programs', $img);
                $imgData = new Programtypeimage;
                $imgData->program_type_id = $data->id;
                $imgData->img_src = $path;
                $imgData->img_alt = $request->title;
                $imgData->save();
            }
        }

        return redirect('admin/ProgramTypes/'.$id.'/edit')->with('success','Data has been added updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function destroy($id)
    {
       ProgramType::where('id',$id)->delete();
        return redirect('admin/ProgramTypes')->with('success','Data has been deleted.');
    }

    public function destroy_image($img_id)
    {
        $data=Programtypeimage::where('id',$img_id)->first();
        Storage::delete($data->img_src);

        Programtypeimage::where('id',$img_id)->delete();
        return response()->json(['bool'=>true]);
    }
}
