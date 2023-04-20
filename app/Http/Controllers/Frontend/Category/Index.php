<?php

namespace App\Http\Controllers\Frontend\Category;

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
        $data['rows']=\Facades\App\Models\Category::all();
        return view('frontend.default.shop.category.index',compact('data'));
    }
}
