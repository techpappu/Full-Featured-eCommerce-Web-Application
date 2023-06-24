<?php

namespace App\Http\Controllers\Backend\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Payment::create($request)){
                return redirect()->route('admin.payment')->with('success','Payment has been successfully added');
            } else{
                return redirect()->route('admin.payment')->with('danger','Payment can not be created!');
            }
        }

        return view('backend.payment.create');
    }
}
