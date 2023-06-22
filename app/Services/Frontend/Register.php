<?php

namespace App\Services\Frontend;

use Illuminate\Support\Facades\Hash;

class Register
{
    public function create($request)
    {
        $request->validate([
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|min:8|string|confirmed',
            'first_name' =>'required',
            'last_name' =>'required',
        ]);
        $data = $request->only(['email','password']);
        $profiledata=$request->only(['first_name','last_name']);
        $data['password']=Hash::make($data['password']);
        $row = \Facades\App\Models\User::create($data);
        $row->profile()->create($profiledata);
        $row->assignRole('member');

        if(!empty($row->id)) return true;
        
        return false;
    }
}