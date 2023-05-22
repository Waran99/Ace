<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login
    function loginView(){
        return view('frontlogin');
    }

    //admin
    //admin

    //customer1
    //1234


    // Login for Club and Customer
    function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' =>  ['required', 'string'],
        ]);
        $customer = Customer::query()->where(['email'=> $credentials['email']])->first();
        if($customer !== null){
            info(json_encode($credentials));
            if(Auth::guard('customer')->attempt($credentials)){
                info('here');
                session(['user_login' => true,'data' => $customer]);
                return redirect('/');
            }
        }
        info('here');
        $club = Club::query()->where(['email'=> $credentials['email']])->first();
        if($club !== null){
            if(Auth::guard('club')->attempt($credentials)){
                session(['user_login' => true,'data' => $club]);
                return redirect('club');
            }
        }

        info('Account not found');
        return redirect('login')->with('error','Account not found');
    }

    // register
    function register(){
        return view('register');
    }

//    // Club register
//    function registerclub(){
//        return view('register/club');
//    }

//    // Logout
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }


//    // Club Logout
//    function logoutclub(){
//        session()->forget(['clublogin','data']);
//        return redirect('login/club');
//    }







}




