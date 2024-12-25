<?php

namespace App\Http\Controllers\Backend\Product\Image;

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
            if (\Facades\App\Services\Backend\Product::storeImage($request)) {
                return redirect()->back()->with('success','Images has been added successfully');
            } else{
                return redirect()->back()->with('danger','Images can not be created!');
            }
        }
    }
}
