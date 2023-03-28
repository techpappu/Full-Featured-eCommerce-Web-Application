<?php

namespace App\Http\Controllers\Backend\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data=[];
        $data['rows']=\Facades\App\Services\Backend\discount::rows(10);
        return view('backend.discount.index',compact('data'));
    }
}
