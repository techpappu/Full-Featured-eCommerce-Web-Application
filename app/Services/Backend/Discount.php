<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Discount
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Discount::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Discount::find($id);

        if (empty($row->id)) return redirect()->route('admin.discount')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'code'  =>'required|min:6|alpha_dash|unique:discounts',
            'label' =>'required|min:4',
            'status'=>'required',
            'rate'  =>'required',
            
        ]);
        $data = $request->only(['code','label','description','quantity','rate','status']);
        $row = \Facades\App\Models\Discount::create($data);
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Discount::find($id);
        $request->validate([
            'code'  =>'required|min:6|alpha_dash|unique:discounts,code'.$id,
            'label' =>'required|min:4',
            'status'=>'required',
            'rate'  =>'required',
            
        ]);
        $data = $request->only(['code','label','description','quantity','rate','status']);
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Discount::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}