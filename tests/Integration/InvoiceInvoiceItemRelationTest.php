<?php

namespace Tests\Integration;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoiceInvoiceItemRelationTest extends TestCase 
{

    use RefreshDatabase;

    public function test_category_product_relation():void 
    {
        
        $shippingData = [
            'label'=>'Demo Shipping',
            'amount'=>10.00,
            'status'=>'active'
        ];

        $shipping = \Facades\App\Models\Shipping::create($shippingData);

        $invoiceData = [
            'shipping_id' => $shipping->id,
            'invoice_date' => date('Y-m-d'),
            'gross_total' => 0,
            'shipping_total'=>0,
            'discount_total'=>0,
            'tax_total'=>0,
            'grand_total'=>0,
            'status' => 'active',
        ];

        $invoice = \Facades\App\Models\Invoice::create($invoiceData);
       
        $product = \Facades\App\Models\Product::create(['name'=>'Demo Product','description'=>'Demo Product','price'=>10.00,'sale_price'=>0.00,'quantity'=>10,'status'=>'active']);
        
        $invoiceItemData = [
            'invoice_id'=>$invoice->id,
            'product_id'=>$product->id,
            'quantity'=>1,
            'price'=>$product->price,
            'total'=> 1 * $product->price
        ];

        $invoiceItem = \Facades\App\Models\InvoiceItem::create($invoiceItemData);
    
        $taxData = [
            'label'=>'Demo Tax',
            'rate'=>0.15,
            'status'=>'active'
        ];

        $tax = \Facades\App\Models\Tax::create($taxData);

        $invoiceTaxData = [
            'invoice_id'=>$invoice->id,
            'tax_id'=>$tax->id,
            'label'=>$tax->label,
            'rate'=>$tax->rate,
            'amount'=>($product->price + $shipping->amount) * $tax->rate
        ];

        $invoiceTax = \Facades\App\Models\InvoiceTax::create($invoiceTaxData);
        
        $this->assertEquals($invoice->shipping->id, $shipping->id);
        $this->assertEquals($invoice->invoiceItems()->first()->id, $invoiceItem->id);
        $this->assertEquals($invoice->invoiceItems()->first()->invoice_id, $invoice->id);
        $this->assertEquals($invoice->invoiceItems()->first()->product_id, $product->id);
        $this->assertEquals($invoice->invoiceTaxes()->first()->tax_id, $invoiceTax->id);
        $this->assertEquals($invoice->invoiceTaxes()->first()->invoice_id, $invoice->id);
    }

}