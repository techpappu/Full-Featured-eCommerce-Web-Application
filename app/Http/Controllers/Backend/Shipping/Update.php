<?php

namespace App\Http\Controllers\Backend\Shipping;

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
            if(\Facades\App\Services\Backend\Shipping::update($id,$request)){
                return redirect()->route('admin.shipping.update',$id)->with('success','Shipping has been successfully updated');
            } else{
                return redirect()->route('admin.shipping.update',$id)->with('danger','Shipping can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Shipping::get($id);
        return view('backend.shipping.update',compact('data'));
    }
}
