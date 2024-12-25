<?php

namespace App\Http\Controllers\Backend\Order;

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
            //dd($request);
            if(\Facades\App\Services\Backend\Invoice::update($id,$request)){
                return redirect()->route('admin.order.update',$id)->with('success','Order updated successfully!');
            } else {
                return redirect()->route('admin.order.update',$id)->with('danger','Order not been updated!');
            }
        }

        $data=[];
        $data['row']=\Facades\App\Services\Backend\Invoice::get($id);
        $data['numberToWord']=\Facades\App\Helpers\Backend\Invoice::numberToWord($data['row']->grand_total);
        return view('backend.order.update',compact('data'));
    }
}
