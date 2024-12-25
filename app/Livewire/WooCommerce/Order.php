<?php

namespace App\Livewire\WooCommerce;

use App\Models\WooCommerce;
use App\Services\WooCommerceService;
use Livewire\WithPagination;
use Livewire\Component;

use function Termwind\render;

class Order extends Component
{
    use WithPagination;

    public $OrderRowNumber=100;
    public $allStatus=[];
    public $statusQuery='all';
    public $selected=[];
    public $actionName;
    public function mount()
    {
        // $syncOrder=new WooCommerceService();
        // $syncOrder->syncOrders();
    }
    public function render()
    {
        //$orders = WooCommerce::orderBy('created_at', 'desc')->paginate(30);
       // dd($this->orders);
       $this->allStatus=[];
       $this->checkstatus();
        return view('livewire.woo-commerce.order',[
            'orders' => WooCommerce::when($this->statusQuery != 'all',function($query){$query->where('status',$this->statusQuery);})
                                    ->orderBy('created_at', 'desc')
                                    ->paginate($this->OrderRowNumber),
        ]);
    }
    public function syncOrder(){
        $syncOrder=new WooCommerceService();
        $syncOrder->syncOrders();
        $this->render();
    }
    public function checkstatus(){
        $allOrders=WooCommerce::all();
        $this->allStatus['all']=$allOrders->count();
        foreach ($allOrders as $order) {
            // If the status exists in the array, increment the count; otherwise, initialize it
            if (!isset($this->allStatus[$order->status])) {
                $this->allStatus[$order->status] = 1;
            } else {
                $this->allStatus[$order->status] += 1;
            }
        }
    }
    public function changeStatusQuery($name){
        return $this->statusQuery=$name;
    }
    public function selectAction(){

        if(isset($this->allStatus[$this->actionName])){
            $this->changeStatus();
        }
    }
    public function changeStatus(){
        WooCommerce::whereIn('id', $this->selected)->update(['status' => $this->actionName]);
        $this->selected=[];
        $this->render();

    }
}
