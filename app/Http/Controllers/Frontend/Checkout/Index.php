<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')){
            $invoice=\Facades\App\Services\Frontend\Checkout::create($request);

            if(!empty($invoice->id)){
                return redirect()->route('checkout.payment',$invoice->id)->with('success','recorded your order. Please confirm your payment to process');
            } else{
                return 'order not been Made!';
            }
        }
        $data=[];
        $data['shippings']=\Facades\App\Models\Shipping::where('status','active')->get();

        return view('frontend.default.shop.checkout.index',compact('data'));
    }
}
