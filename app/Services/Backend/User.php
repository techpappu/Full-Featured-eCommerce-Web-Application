<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\User::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\User::find($id);

        if (empty($row->id)) return redirect()->route('admin.user')->with('warning','Data not found!');

        return $row;

    }

    public function create(Request $request)
    {   

        $request->validate([
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|min:8|string|confirmed',
        ]);
        $data = $request->only(['email','password']);
        $profiledata=$request->only(['first_name','last_name','address','city','district','postcode','phone']);
        $data['password']=Hash::make($data['password']);
        $row = \Facades\App\Models\User::create($data);
        $row->profile()->create($profiledata);
        
        if($request->profile){
            $row->addMedia($request->profile)->toMediaCollection('profile');
        }
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\User::find($id);
        if($row->email==$request->email){

            $request->validate([
                'email' =>'required|string|email|max:255|unique:users,email'.$id,
            ]);

        } else{
            
            $request->validate([
                'email' =>'required|string|email|max:255|unique:users',
            ]);
        }

        if (request('password')){

            $request->validate([
                'password' =>'required|min:8|string|confirmed',
            ]);
            $data = $request->only(['email','password']);
            $data['password']=Hash::make($data['password']);
        } else{

            $data = $request->only(['email']);

        }
        
        $profiledata=$request->only(['first_name','last_name','address','city','district','postcode','phone']);

        if (!empty($row->id)) {
            $row->update($data);
            $row->profile()->update($profiledata);

            if($request->profile){
                if($row->hasMedia('profile')){
                    $row->getFirstMedia('profile')->delete();
                }
                $row->addMedia($request->profile)->toMediaCollection('profile');
            }

            return true;
        }

        return false;

    }
    public function delete($request)
    {
        $data=\Facades\App\Models\User::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}