<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Category::delete($request)){
                return redirect()->route('admin.category',$id)->with('success','Category has been successfully Deleted');
            } else{
                return redirect()->route('admin.category',$id)->with('danger','Category can not be Deleted!');
            }
        }
    }
}
