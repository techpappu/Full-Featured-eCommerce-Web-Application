<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Category::create($request)){
                return redirect()->route('admin.category')->with('success','Category has been successfully added');
            } else{
                return redirect()->route('admin.category')->with('danger','Category can not be created!');
            }
        }

        return view('backend.category.create');
    }
}
