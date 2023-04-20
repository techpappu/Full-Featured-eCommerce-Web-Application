<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Category
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\App\Models\Category::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\App\Models\Category::find($id);

        if (empty($row->id)) return redirect()->route('admin.category')->with('warning','Data not found!');

        return $row;

    }


    public function create(Request $request)
    {
        
        $request->validate([
            'name' =>'required|min:4',
            
        ]);
        $data = $request->only(['name','description']);
        $row = \Facades\App\Models\Category::create($data);
        if($request->file){
            $row->addMedia($request->file)->toMediaCollection('category');
        }
        if(!empty($row->id)) return true;
        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\App\Models\Category::find($id);
        $request->validate([
            'name' =>'required|min:4',
        ]);
        $data = $request->only(['name','description']);

        $file=$row->getFirstMedia('category');

        if(!empty($request->file)){
            if(!empty($file->id)){
                $row->getFirstMedia('category')->delete();
            }
            $row->addMedia($request->file)->toMediaCollection('category');
        }

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    
    public function delete($request)
    {
        $data=\Facades\App\Models\Category::find($request->id);
        $data->products()->detach();
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}