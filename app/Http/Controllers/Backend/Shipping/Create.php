<?php

namespace App\Http\Controllers\Backend\Shipping;

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
            if(\Facades\App\Services\Backend\Shipping::create($request)){
                return redirect()->route('admin.shipping')->with('success','Shipping has been successfully added');
            } else{
                return redirect()->route('admin.shipping')->with('danger','Shipping can not be created!');
            }
        }

        return view('backend.shipping.create');
    }
}
