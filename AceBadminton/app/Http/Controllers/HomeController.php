<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use App\Models\ProgramType;
use App\Models\Programtypeimage;

class HomeController extends Controller
{
    //HomePage
    function home(){
//        $ProgramTypes=ProgramType::all();
        return view('home');

    }

    //HomePage
    function club(){
        $Club=Club::all();
        return view('club',['Club'=>$Club]);

    }


}
