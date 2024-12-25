<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('POST')){
            if(\Facades\App\Services\Backend\Permission::create($request)){
                return redirect()->route('admin.permission')->with('success','Permission has been successfully added');
            }   else{
                return redirect()->route('admin.permission')->with('danger','Permission can not be created!');
            }
        }
        return view('backend.permission.create');
    }
}
