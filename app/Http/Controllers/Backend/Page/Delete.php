<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Page::delete($request)){
                return redirect()->route('admin.page')->with('success','Page has been deleted!');
            } else {
                return redirect()->route('admin.page')->with('danger','Page has not been deleted!');
            }
        }
    }
}
