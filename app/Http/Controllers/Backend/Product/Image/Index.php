<?php

namespace App\Http\Controllers\Backend\Product\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        $data=[];
        $data['product']=\Facades\App\Models\Product::find($id);
        $data['rows']=$data['product']->getMedia('product');
        return view('backend.product.images',compact('data'));
    }
}
