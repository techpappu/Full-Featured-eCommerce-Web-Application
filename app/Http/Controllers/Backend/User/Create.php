<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        if ($request->isMethod('POST')){
            if (\Facades\App\Services\Backend\User::create($request)) {
                return redirect()->route('admin.user')->with('success','User Has been successfully added');
            } else{
                return redirect()->route('admin.user')->with('danger','user can not be created!');
            }
        }

        return view('backend.user.create');
    }
}
