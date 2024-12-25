<?php

namespace App\Http\Controllers\Backend\Product\Image;

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
            if(\Facades\App\Services\Backend\Product::deleteImage($request)){
                return redirect()->back()->with('success','Images has been successfully Deleted');
            } else{
                return redirect()->back()->with('danger','Images can not be Deleted!');
            }
        }
    }
}
