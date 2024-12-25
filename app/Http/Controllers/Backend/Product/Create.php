<?php

namespace App\Http\Controllers\Backend\Product;

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
            if (\Facades\App\Services\Backend\Product::create($request)) {
                return redirect()->route('admin.product')->with('success','Product has been successfully added');
            } else{
                return redirect()->route('admin.product')->with('danger','Product can not be created!');
            }
        }
        $data=[];
        $data['categories']=\Facades\App\Models\Category::all();

        return view('backend.product.create',compact('data'));
    }
}
