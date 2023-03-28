<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Shipping
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Shipping::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Shipping::find($id);

        if (empty($row->id)) return redirect()->route('admin.shipping')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'label' =>'required|min:4',
            'amount' =>'required',
            'status' =>'required',
            
        ]);
        $data = $request->only(['label','amount','status']);
        $row = \Facades\App\Models\Shipping::create($data);
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Shipping::find($id);
        $request->validate([
            'label' =>'required|min:4',
            'amount' =>'required',
            'status' =>'required',
        ]);
        $data = $request->only(['label','amount','status']);
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Shipping::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}