<?php

namespace App\Http\Controllers\Backend\Product;

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
            if(\Facades\App\Services\Backend\Product::delete($request)){
                return redirect()->route('admin.product')->with('success','Product has been successfully Deleted');
            } else{
                return redirect()->route('admin.product')->with('danger','Product can not be Deleted!');
            }
        }
    }
}
