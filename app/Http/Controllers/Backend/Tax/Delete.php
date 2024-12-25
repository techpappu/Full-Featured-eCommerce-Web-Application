<?php

namespace App\Http\Controllers\Backend\Tax;

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
            if(\Facades\App\Services\Backend\Tax::delete($request)){
                return redirect()->route('admin.tax')->with('success','Tax has been successfully Deleted');
            } else{
                return redirect()->route('admin.tax')->with('danger','Tax can not be Deleted!');
            }
        }
    }
}
