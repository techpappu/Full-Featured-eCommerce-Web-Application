<?php

namespace App\Services;

use Automattic\WooCommerce\Client;
use App\Models\WooCommerce;
use Illuminate\Support\Facades\Log;

class WooCommerceService
{
    protected $woocommerce;

    public function __construct()
    {
        $siteUrl = env('WOOCOMMERCE_SITE_URL');
        $consumerKey = env('WOOCOMMERCE_CONSUMER_KEY');
        $consumerSecret = env('WOOCOMMERCE_CONSUMER_SECRET');

        if (empty($siteUrl) || empty($consumerKey) || empty($consumerSecret)) {
            throw new \Exception('WooCommerce API credentials are not set correctly.');
        }


        $this->woocommerce = new Client(
            $siteUrl,
            $consumerKey,
            $consumerSecret,
            [
                'version' => 'wc/v3',
                'verify_ssl' => false,
            ]
        );
    }

    public function syncOrders()
    {
        // Fetch orders from WooCommerce
        $orders = $this->woocommerce->get('orders', [
            'per_page'  => 100,   // Limit to 100 orders
            'orderby' => 'date',    // Order by date
            'order' => 'desc',      // Descending order to get the latest orders first
            'timestamp' => time()
        ]);

        foreach ($orders as $wooOrder) {
            WooCommerce::updateOrCreate(
                ['woocommerce_order_id' => $wooOrder->id],
                [
                    'wc_visual_order_id' => $wooOrder->number,
                    'status' => $wooOrder->status,
                    'currency' => $wooOrder->currency,
                    'total' => $wooOrder->total,
                    'payment_method' => $wooOrder->payment_method,
                    'shipping_total' => $wooOrder->shipping_total,
                    'discount_total' => $wooOrder->discount_total,
                    'fee_lines' => collect($wooOrder->fee_lines)->map(function ($fee) {
                        return [
                            'name' => $fee->name,
                            'amount' => $fee->amount,
                        ];
                    })->toArray(),
                    'customer_details' => [
                        'first_name' => $wooOrder->billing->first_name,
                        'address' => $wooOrder->billing->address_1,
                        'phone' => $wooOrder->billing->phone,
                    ],
                    'items' =>collect($wooOrder->line_items)->map(function ($item) {
                        return [
                            'name' => $item->name,
                            'quantity' => $item->quantity,
                            'total' => $item->total,
                        ];
                    })->toArray(),
                ]
            );
            //log::info("WooCommerce Order Number: " . $wooOrder->number);
        }
    }
}
