<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Landing extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
        $data=[];
        $data['slider']=\Facades\App\Models\Slide::where('status','active')->get();
        $data['category']=\Facades\App\Models\Category::where('featured', true)->get();
        $data['product']=\Facades\App\Models\Product::paginate(8);
        $data['columns']='four';
        return view('frontend.default.shop.page.landing',compact('data'));
    }
}
