<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials))
        {
            return view('dashboard');
        }
        else 
        {
            return Redirect::back()->with('status','Invalid Credential!');
        }
    }

    function logout()
    {
        Session::flush();
        return  redirect('/')->with('status','Logged Out Successfully');;
    }
}
