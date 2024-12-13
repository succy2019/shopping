<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetUserController extends Controller
{
    
public function GetUser()
{
    $users = User::all();
    return view('admin.allUsers', ['users'=>$users]);
}

public function Getprofile()
{
    return view('admin.userprofile');
}

public function showProfile($id)
{
    $user = User::find($id); // Assuming a User model
    if ($user) {
        return view('admin.userprofile', ['user' => $user]);
    } else {
        return redirect()->back()->with('error', 'User not found.');
    }
}
public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User  not found.');
    }

    $user->delete();

    return redirect()->back()->with('success', 'User  deleted successfully.');
}
public function EditUser($id)
{
    $user = User::join('meters','meters.userId','='.'users.id')->where('users.id',$id)->first();
     // Assuming a User model
    if ($user) {
        return view('admin.userprofile', ['user' => $user]);
    } else {
        return redirect()->back()->with('error', 'User not found.');
    }
}



}
