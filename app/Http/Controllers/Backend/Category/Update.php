<?php

namespace App\Http\Controllers\Backend\Category;

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
            if(\Facades\App\Services\Backend\Category::update($id,$request)){
                return redirect()->route('admin.category.update',$id)->with('success','Category has been successfully updated');
            } else{
                return redirect()->route('admin.category.update',$id)->with('danger','Category can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Category::get($id);
        return view('backend.category.update',compact('data'));
    }
}
