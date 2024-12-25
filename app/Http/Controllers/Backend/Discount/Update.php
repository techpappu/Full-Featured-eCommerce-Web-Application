<?php

namespace App\Http\Controllers\Backend\Discount;

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
            if(\Facades\App\Services\Backend\Discount::update($id,$request)){
                return redirect()->route('admin.discount.update',$id)->with('success','Discount has been successfully updated');
            } else{
                return redirect()->route('admin.discount.update',$id)->with('danger','Discount can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Discount::get($id);
        return view('backend.discount.update',compact('data'));
    }
}
