<?php

namespace App\Http\Controllers\Backend\Payment;

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
            if(\Facades\App\Services\Backend\Payment::update($id,$request)){
                return redirect()->route('admin.payment.update',$id)->with('success','Payment has been successfully updated');
            } else{
                return redirect()->route('admin.payment.update',$id)->with('danger','Payment can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Payment::get($id);
        return view('backend.payment.update',compact('data'));
    }
}
