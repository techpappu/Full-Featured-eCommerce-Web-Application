<?php

namespace App\Http\Controllers\Backend\Permission;

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
        $data['rows']=\Facades\App\Services\Backend\Permission::rows(20);
        return view('backend.permission.index',compact('data'));
    }
}
