<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        $data=[];
        $data['cat']=\Facades\App\Models\Category::find($id);
        $data['category']=\Facades\App\Models\Category::all();
        $data['products']=$data['cat']->products()->paginate(2);
        $data['columns']='four';
        return view('frontend.default.shop.category.products',compact('data'));
    }
}
