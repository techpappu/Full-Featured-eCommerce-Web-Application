<?php

namespace App\Http\Controllers\Backend\Role;

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
            if(\Facades\App\Services\Backend\Role::delete($request)){
                return redirect()->route('admin.role')->with('success','Role has been successfully Deleted');
            } else{
                return redirect()->route('admin.role')->with('danger','Role can not be Deleted!');
            }
        }
    }
}
