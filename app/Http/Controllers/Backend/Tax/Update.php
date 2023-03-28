<?php

namespace App\Http\Controllers\Backend\Tax;

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
            if(\Facades\App\Services\Backend\Tax::update($id,$request)){
                return redirect()->route('admin.tax.update',$id)->with('success','Tax has been successfully updated');
            } else{
                return redirect()->route('admin.tax.update',$id)->with('danger','Tax can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Tax::get($id);
        return view('backend.tax.update',compact('data'));
    }
}
