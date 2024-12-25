<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( Int $id,Request $request)
    {
        $data=[];
        $data['row']=\Facades\App\Models\Product::find($id);
        $data['category']=$data['row']->categories()->first();
        $data['related_product']=$data['category']->products()->where('id', '!=', $data['row']->id)->get();
        $data['columns']='four';
        return view('frontend.default.shop.product.single',compact('data'));
    }
}
