<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    
    public function index(){
        $transactions = Transaction::all();

        return view('admin.transaction',['transactions'=>$transactions]);
    }

    public function GetUserTransaction($id)
    {
        
        $validatedData = request()->validate([
            'id' => 'required|integer|exists:users,id', 
        ]);

        $transactions = Transaction::where('userId', $id)->get();

        return view('admin.transaction', ['transactions' => $transactions]);
    }
}
