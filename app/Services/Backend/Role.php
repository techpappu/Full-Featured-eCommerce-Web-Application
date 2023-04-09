<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Role
{
    public function rows(Int $per_page)
    {

        $rows = \Facades\Spatie\Permission\Models\Role::paginate($per_page);

        return $rows;

    }

    public function get(Int $id)
    {

        $row = \Facades\Spatie\Permission\Models\Role::find($id);

        if (empty($row->id)) return redirect()->route('admin.role')->with('warning','Data not found!');

        return $row;

    }

    public function create(Request $request)
    {
        
        $request->validate([
            'name' =>'required|min:3|',

        ]);

        $data = $request->only(['name']);

        $row = \Facades\Spatie\Permission\Models\Role::create($data);

        if(!empty($row->id)) return true;

        return false;

    }
    public function update(Int $id,Request $request)
    {
        $row = \Facades\Spatie\Permission\Models\Role::find($id);
        
        $request->validate([
            'name' =>'required|min:3',
        ]);
        
        $data = $request->only(['name']);

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
    public function delete($request)
    {
        $data=\Facades\Spatie\Permission\Models\Role::find($request->id);
        
        if(!empty($data->id)){
            $data->delete();
            return true;
        }
        return false;
    }
}