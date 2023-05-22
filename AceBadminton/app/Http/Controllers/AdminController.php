<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Club;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function dashboard()
    {
        $labels = [];
        $data = [];
        return view('dashboard', ['labels'=>$labels,'data'=>$data]);
    }
}
