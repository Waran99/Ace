<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Club;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PortalController extends Controller
{
    // Login
    function loginView()
    {
        return view('login');
    }

    // Check Login
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' =>  ['required', 'string'],
        ]);
        $admin = Admin::query()->where(['email'=> $credentials['email']])->first();
        if($admin !== null){
            if(Auth::guard('admin')->attempt($credentials)){
                return redirect('admin');
            }
        }
        $club = Club::query()->where(['email'=> $credentials['email']])->first();
        if($club !== null){
            if(Auth::guard('club')->attempt($credentials)){
                return redirect('club');
            }
        }
        return redirect('portal/login')->with('error', 'Account not found');
    }

    // Logout
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('portal/login');
    }
}
