<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Usercontroller extends Controller
{

public function login(Request $request)
{

    $credentials = $request->validate(['meter_number' =>'required']);

    $user = User::where('meter_number',$credentials['meter_number'])->first();


          if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }


    return back()->withErrors([
        'Meter' => 'The provided credentials do not match our records.',
    ]);
}

public function indexLogin()
{
    return view('auth.login');
}





}
