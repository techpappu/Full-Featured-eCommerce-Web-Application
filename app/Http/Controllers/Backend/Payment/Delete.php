<?php

namespace App\Http\Controllers\Backend\Payment;

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
            if(\Facades\App\Services\Backend\Payment::delete($request)){
                return redirect()->route('admin.payment')->with('success','Payment has been successfully Deleted');
            } else{
                return redirect()->route('admin.payment')->with('danger','Payment can not be Deleted!');
            }
        }
    }
}
