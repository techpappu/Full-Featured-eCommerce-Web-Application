<?php

namespace App\Services\Frontend;

use Illuminate\Support\Facades\Auth;

class Login
{
    public function login($request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user=\Facades\App\Models\User::where('email', $request->email)->first();

            if($user->hasRole('member')){
                return true;
            }else{
                Auth::logout();
                return false;
            }
            
        }
  
        return false;
    }
}