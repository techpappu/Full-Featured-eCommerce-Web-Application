<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Permission extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Int $id)
    {
        $data=[];
        $data['rows'] = \Facades\App\Services\Backend\Permission::all(); //return Model::all();
        $data['role'] = \Facades\App\Services\Backend\Role::get($id);
        $data['allowedpermissions'] = $data['role']->permissions()->pluck('id')->toArray();

        if($request->isMethod('POST')){
            if(\Facades\App\Services\Backend\Role::permission($request,$id)){
                return redirect()->route('admin.role.permissions',$id)->with('success','Role permissions has been successfully added');
            }   else{
                return redirect()->route('admin.role.permissions',$id)->with('danger','Role permissions can not be created!');
            }
        }

        return view('backend.role.permission',compact('data'));
    }
}
