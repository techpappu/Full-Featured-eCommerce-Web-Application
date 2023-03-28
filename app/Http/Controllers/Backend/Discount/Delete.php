<?php

namespace App\Http\Controllers\Backend\Discount;

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
            if(\Facades\App\Services\Backend\Discount::delete($request)){
                return redirect()->route('admin.discount')->with('success','Discount has been successfully Deleted');
            } else{
                return redirect()->route('admin.discount')->with('danger','Discount can not be Deleted!');
            }
        }
    }
}
