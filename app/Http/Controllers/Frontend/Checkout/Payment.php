<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Payment extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {   
        $data=[];
        $data['invoice']=\Facades\App\Models\Invoice::find($id);

        if ($request->isMethod('POST')){
            if($request->payment=='COD'){
                $data['invoice']->status=$request->payment.' Processing';
                $data['invoice']->update();
                return view('frontend.default.shop.checkout.thankyou',compact('data'));
            }
            
            
        }

        return view('frontend.default.shop.checkout.payment',compact('data'));
    }
}
