<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Invoice
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Invoice::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Invoice::find($id);

        if (empty($row->id)) return redirect()->route('admin.order')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'status' =>'required',
            'title' =>'required|min:4',
        ]);
        $data = $request->only(['title','status','content']);
        $row = \Facades\App\Models\Page::create($data);
        if($request->file){
            $row->addMedia($request->file)->toMediaCollection('page');
        }
        
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        

    }
    
    public function delete($request)
    {
        
    }
}