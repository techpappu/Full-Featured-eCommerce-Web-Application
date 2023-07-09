<?php

namespace App\Services\Frontend;

use App\Http\Controllers\Frontend\Cart\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Checkout
{
    function create(Request $request)
    {
        
        if(Auth::check()){
            $user = Auth::user();
            $userProfile=$request->only(['first_name','last_name','address','city','district','postcode','phone']);
            $user->profile()->update($userProfile);
        }else{
            $request->validate([
                'email' =>'required|string|email|max:255|unique:users',
            ]);
            $userData=$request->only(['email']);
            $userData['password']=Hash::make(Str::random(8));
            $user=\Facades\App\Models\User::create($userData);
            $userProfile=$request->only(['first_name','last_name','address','city','district','postcode','phone']);
            $user->profile()->create($userProfile);
        }
        $invoiceData=[];
        $invoiceData=$request->only('shipping_id');
        $invoiceData['invoice_date']=Carbon::now();
        $invoiceData['shipping_total']=\Facades\App\Models\Shipping::find($request->shipping_id)->amount;
        $invoiceData['gross_total']=0;
        $invoiceData['tax_total']=0;
        $invoiceData['grand_total']=0;
        $invoiceData['status']='';
        $invoice=$user->invoice()->create($invoiceData);

        //create Invoice Item
        $product=$request->products;
        $quantity=$request->quantity;
        $invoiceItemsData=[];
        $totalPrice=0;
        for($i=0;$i<count($product);$i++){
            $productData=\Facades\App\Models\Product::find($product[$i]);
            $invoiceItemsData['product_id']=$product[$i];
            $invoiceItemsData['quantity']=$quantity[$i];
           
            if($productData->sale_price){
                $invoiceItemsData['total']=$productData->getRawOriginal('sale_price')*$quantity[$i];
                $invoiceItemsData['price']=$productData->getRawOriginal('sale_price');
                $totalPrice+=$invoiceItemsData['total'];
            }else{
                $invoiceItemsData['total']=$productData->getRawOriginal('price')*$quantity[$i];
                $invoiceItemsData['price']=$productData->getRawOriginal('price');
                $totalPrice+=$invoiceItemsData['total'];
            }
            $invoice->invoiceItems()->create($invoiceItemsData);
        }
        
        //create Invoice texes
        $invoiceTaxesData=[];
        $totalTax=0;
        $taxes=\Facades\App\Models\Tax::where('status','active')->get();
        foreach($taxes as $tax){
            $invoiceTaxesData['tax_id']=$tax->id;
            $invoiceTaxesData['label']=$tax->label;
            $invoiceTaxesData['rate']=$tax->rate;
            $invoiceTaxesData['amount']=($totalPrice/100)*$tax->rate;
            $totalTax+=$invoiceTaxesData['amount'];
            $invoice->invoiceTaxes()->create($invoiceTaxesData);
        }

        //IF discount code applied
        if($request->discount_code){
            $discount=\Facades\App\Models\Discount::where('code',$request->discount_code)->first();
            if( (is_null($discount->quantity) || $discount->quantity > 0) && $discount->status=='active'){
                $invoice->discount_id=$discount->id;
                $invoice->discount_total=($totalPrice/100)*$discount->rate;
                session()->forget('discount_code');
                if(!is_null($discount->quantity)){
                    $discount->quantity=$discount->quantity-1;
                    $discount->update();
                }
                
            }
        }

        //update invoice other data 
        $invoice->gross_total=$totalPrice;
        $invoice->tax_total=$totalTax;
        $invoice->grand_total=$invoice->shipping_total+$invoice->gross_total+$totalTax-$invoice->discount_total;
        $invoice->status='Pending';
        $invoice->update();

        return $invoice;

    }
}