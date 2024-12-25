<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class View extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id)
    {
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Invoice::get($id);
        return view('backend.order.view',compact('data'));
    }
}
