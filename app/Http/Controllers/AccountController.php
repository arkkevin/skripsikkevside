<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function search(Request $request){
        $query = $request->input('query');

        // Search the users table
        $accounts = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();

        return view('searchaccount', compact('accounts'));
    }
}
