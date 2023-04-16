<?php

namespace App\Http\Controllers\Backend\Slide;

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
            if(\Facades\App\Services\Backend\Slide::delete($request)){
                return redirect()->route('admin.slide')->with('success','Slide has been deleted!');
            } else {
                return redirect()->route('admin.slide')->with('danger','Slide has not been deleted!');
            }
        }
    }
}
