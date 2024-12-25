<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Invoice
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Invoice::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Invoice::find($id);

        if (empty($row->id)) return redirect()->route('admin.order')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        
    }
    public function update(Int $id,Request $request)
    {
        $invoice=\Facades\App\Models\Invoice::find($id);
        $invoice->status=$request->status;

        $gross_total=0;
        foreach($request->items as $index=>$item){
            $invoiceItem=\Facades\App\Models\InvoiceItem::find($item);
            $invoiceItem->quantity=$request->quantity[$index];
            $invoiceItem->total=$invoiceItem->quantity*$invoiceItem->price;
            $gross_total=$gross_total+$invoiceItem->total;
            $invoiceItem->update();
        }

        $tax_total=0;
        foreach($invoice->invoiceTaxes as $tax){
            $tax->amount=($gross_total/100)*$tax->rate;
            $tax_total+=$tax->amount;
            $tax->update();
        }
        if(!empty($invoice->discount_id)){
            $invoice->discount_total=($gross_total/100)*$invoice->discount->rate;
        }
        $invoice->gross_total=$gross_total;
        $invoice->tax_total=$tax_total;
        $invoice->grand_total=$gross_total+$tax_total+$invoice->shipping_total-$invoice->discount_total;

        if(!empty($invoice)){
            $invoice->update();
            return true;
        }
        return false;
        

    }
    
    public function delete($request)
    {
        
    }
}