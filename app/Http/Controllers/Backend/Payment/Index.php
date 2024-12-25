<?php

namespace App\Http\Controllers\Backend\Payment;

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
        $data['rows']=\Facades\App\Services\Backend\Payment::rows(10);
        return view('backend.payment.index',compact('data'));
    }
}
