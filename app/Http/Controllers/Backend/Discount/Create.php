<?php

namespace App\Http\Controllers\Backend\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')){
            if (\Facades\App\Services\Backend\Discount::create($request)) {
                return redirect()->route('admin.discount')->with('success','Discount has been successfully added');
            } else{
                return redirect()->route('admin.discount')->with('danger','Discount can not be created!');
            }
        }

        return view('backend.discount.create');
    }
}
