<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\WooCommerceService;

class SyncWooCommerceOrders extends Command
{
    protected $signature = 'sync:woocommerce-orders';
    protected $description = 'Sync WooCommerce orders to the local database';

    protected $wooCommerceService;

    public function __construct(WooCommerceService $wooCommerceService)
    {
        parent::__construct();
        $this->wooCommerceService = $wooCommerceService;
    }

    public function handle()
    {
        $this->info('Starting WooCommerce order sync...');
        $this->wooCommerceService->syncOrders();
        $this->info('WooCommerce order sync completed.');
    }
}
