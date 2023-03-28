<?php

namespace App\Http\Controllers\Backend\Page;

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
            if (\Facades\App\Services\Backend\Page::create($request)) {
                return redirect()->route('admin.page')->with('success','Page has been successfully added');
            } else{
                return redirect()->route('admin.page')->with('danger','page can not be created!');
            }
        }

        return view('backend.page.create');
    }
}
