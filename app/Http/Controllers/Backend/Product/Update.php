<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Update extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Product::update($id,$request)){
                return redirect()->route('admin.product.update',$id)->with('success','Product has been successfully updated');
            } else{
                return redirect()->route('admin.product.update',$id)->with('danger','Product can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Product::get($id);
        $data['categories']=\Facades\App\Models\Category::all();
        $data['inCategories'] = $data['row']->categories()->pluck('id')->toArray();
        return view('backend.product.update',compact('data'));
    }
}
