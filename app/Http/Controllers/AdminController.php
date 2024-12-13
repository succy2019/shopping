<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product; 
use App\Models\Cart; 
use App\Models\OrderItem; 
use App\Models\Order; 
use App\Models\Admin; 

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Exists;

class AdminController extends Controller
{
   
    

public function Home()
 {
       
        return view('admin.index');
 }
public function Dashboard()
 {
       
        return view('admin.dashboard');
 }


public function indexlogin()
{
        return view('auth.admin');
 }


public function Login (Request $request)
{
 
    $login = $request->validate(['email'=>'required', 'password'=>'required']);

    if(Auth::guard('admin')->attempt($login))
    {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')->with('status','Welcome back');

    }

    return redirect()->route('admin.login')->with('status','INVALID LOGIN');

}



}
