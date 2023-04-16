<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Product
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Product::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Product::find($id);

        if (empty($row->id)) return redirect()->route('admin.discount')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'name' =>'required|min:5',
            'price'  =>'required',
            'status'=>'required',
            
        ]);
        $data = $request->only(['name','description','price','quantity','sale_price','sale_expiry_date','status']);
        $row = \Facades\App\Models\Product::create($data);

        if($request->file){
            $row->addMedia($request->file)->toMediaCollection('product');
        }

        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Product::find($id);
        $request->validate([
            'name' =>'required|min:5',
            'price'  =>'required',
            'status'=>'required',
            
        ]);
        $data = $request->only(['name','description','price','quantity','sale_price','sale_expiry_date','status']);
        $file=$row->getFirstMedia('product');

        
        if(!empty($request->file)){
            if(!empty($file->id)){
                $row->getFirstMedia('product')->delete();
            }
            $row->addMedia($request->file)->toMediaCollection('product');
        }
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Product::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}