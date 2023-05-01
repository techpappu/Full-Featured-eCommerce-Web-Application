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
        $row->categories()->sync($request->categories);

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
        $row->categories()->sync($request->categories);

        
        if(!empty($request->file)){
            foreach($request->file as $image){
                $row->addMedia($image)->toMediaCollection('product');
            }    
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
        $data->categories()->detach();
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }

    public function storeImage($request)
    {
        $data=\Facades\App\Models\Product::find($request->id);
         foreach($request->file('files') as $file){
             $data->addMedia($file)->toMediaCollection('product');
         }
         
         if(!empty($data->id)) return true;
        return false;
    }

    public function deleteImage($request)
    {
        $data=\Facades\Spatie\MediaLibrary\MediaCollections\Models\Media::find($request->id);

        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}