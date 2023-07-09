<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Discount extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $discount=\Facades\App\Models\Discount::where('code',$request->code)->first();
        if(!empty($discount)){
            if( (is_null($discount->quantity) || $discount->quantity > 0) && $discount->status=='active'){
                session()->put('discount_code', $discount->code);
                return redirect()->route('cart')->with('success','Discount name:"'.$discount->label.'" has been successfully applied and you got '.$discount->rate.'% discount.');
            }else{
                return redirect()->route('cart')->with('danger','Discount name:"'.$discount->label.'" has been expired!');
            }
            
        }
        return redirect()->route('cart')->with('danger','Invalid Discount Code!');
    }
}
