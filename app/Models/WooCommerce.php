<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WooCommerce extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'woocommerce_order_id','wc_visual_order_id', 'status', 'currency', 'total',
        'payment_method', 'shipping_total', 'discount_total', 'fee_lines',
        'customer_details', 'items'
    ];

    protected $casts = [
        'customer_details' => 'object',
        'items' => 'array',
        'fee_lines' => 'array',
    ];
}
