<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\User::delete($request)){
                return redirect()->route('admin.user')->with('success','User has been successfully Deleted');
            } else{
                return redirect()->route('admin.user')->with('danger','User can not be Deleted!');
            }
        }
    }
}
