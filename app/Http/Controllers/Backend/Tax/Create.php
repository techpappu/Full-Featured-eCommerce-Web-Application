<?php

namespace App\Http\Controllers\Backend\Tax;

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
            if(\Facades\App\Services\Backend\Tax::create($request)){
                return redirect()->route('admin.tax')->with('success','Tax has been successfully added');
            } else{
                return redirect()->route('admin.tax')->with('danger','Tax can not be created!');
            }
        }

        return view('backend.tax.create');
    }
}
