<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Slide
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Slide::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Slide::find($id);

        if (empty($row->id)) return redirect()->route('admin.slide')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'status' =>'required',
            'title' =>'required|min:4',
        ]);
        $data = $request->only(['title','status']);
        $row = \Facades\App\Models\Slide::create($data);
        if($request->file){
            $row->addMedia($request->file)->toMediaCollection('slide');
        }
        
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Slide::find($id);
        $request->validate([
            'status' =>'required',
            'title' =>'required|min:4',
        ]);
        $data = $request->only(['title','status']);
        $file=$row->getFirstMedia('slide');

        if(!empty($request->file)){
            if(!empty($file->id)){
                $row->getFirstMedia('slide')->delete();
            }
            $row->addMedia($request->file)->toMediaCollection('slide');
        }
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Slide::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}