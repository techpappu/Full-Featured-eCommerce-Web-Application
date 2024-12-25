<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Tax
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Tax::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Tax::find($id);

        if (empty($row->id)) return redirect()->route('admin.tax')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'label' =>'required|min:4',
            'rate' =>'required',
            'status' =>'required',
            
        ]);
        $data = $request->only(['label','rate','status']);
        $row = \Facades\App\Models\Tax::create($data);
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\tax::find($id);
        $request->validate([
            'label' =>'required|min:4',
            'rate' =>'required',
            'status' =>'required',
        ]);
        $data = $request->only(['label','rate','status']);
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Tax::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}