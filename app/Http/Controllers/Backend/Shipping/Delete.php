<?php

namespace App\Http\Controllers\Backend\Shipping;

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
            if(\Facades\App\Services\Backend\Shipping::delete($request)){
                return redirect()->route('admin.shipping')->with('success','Shipping has been successfully Deleted');
            } else{
                return redirect()->route('admin.shipping')->with('danger','Shipping can not be Deleted!');
            }
        }
    }
}
