<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Page
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Page::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Page::find($id);

        if (empty($row->id)) return redirect()->route('admin.page')->with('warning','Data not found!');

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
        $row = \Facades\App\Models\Page::find($id);
        $request->validate([
            'status' =>'required',
            'title' =>'required|min:4',
        ]);
        $data = $request->only(['title','status','content']);
        $file=$row->getFirstMedia('page');

        if(!empty($request->file)){
            if(!empty($file->id)){
                $row->getFirstMedia('page')->delete();
            }
            $row->addMedia($request->file)->toMediaCollection('page');
        }
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Page::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}