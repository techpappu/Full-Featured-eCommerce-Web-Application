<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Permission::delete($request)){
                return redirect()->route('admin.permission')->with('success','Permission has been successfully Deleted');
            } else{
                return redirect()->route('admin.permission')->with('danger','Role Permission not be Deleted!');
            }
        }
    }
}
