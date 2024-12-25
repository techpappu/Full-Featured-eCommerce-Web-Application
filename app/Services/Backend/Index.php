<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Index
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        }
  
        return false;
    }
}