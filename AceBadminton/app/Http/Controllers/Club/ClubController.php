<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
class ClubController extends Controller {

    function dashboard()
    {
        function dashboard()
        {
            $labels = [];
            $data = [];
            return view('dashboard', ['labels'=>$labels,'data'=>$data]);
        }
    }
}
