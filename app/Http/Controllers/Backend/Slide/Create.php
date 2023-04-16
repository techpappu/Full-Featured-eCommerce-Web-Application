<?php

namespace App\Http\Controllers\Backend\Slide;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')){
            if (\Facades\App\Services\Backend\Slide::create($request)) {
                return redirect()->route('admin.slide')->with('success','Slide has been successfully added');
            } else{
                return redirect()->route('admin.slide')->with('danger','Slide can not be created!');
            }
        }

        return view('backend.slide.create');
    }
}
