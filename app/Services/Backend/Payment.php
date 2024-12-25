<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Payment
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Payment::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Payment::find($id);

        if (empty($row->id)) return redirect()->route('admin.payment')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'label' =>'required|min:4',
            'status' =>'required',
            
        ]);
        $data = $request->only(['label','status']);
        $row = \Facades\App\Models\Payment::create($data);
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Payment::find($id);
        $request->validate([
            'label' =>'required|min:4',
            'status' =>'required',
        ]);
        $data = $request->only(['label','status']);
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Payment::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}