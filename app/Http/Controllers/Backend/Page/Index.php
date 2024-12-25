<?php

namespace App\Http\Controllers\Backend\Page;

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
        $data['rows']=\Facades\App\Services\Backend\Page::rows(20);
        return view('backend.page.index',compact('data'));
    }
}
