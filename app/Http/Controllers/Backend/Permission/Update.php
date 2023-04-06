<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Update extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Int $id,Request $request)
    {
        if ($request->isMethod('POST')) {
            if(\Facades\App\Services\Backend\Permission::update($id,$request)){
                return redirect()->route('admin.permission.update',$id)->with('success','Permission has been successfully updated');
            } else{
                return redirect()->route('admin.permission.update',$id)->with('danger','Permission can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Permission::get($id);
        return view('backend.permission.update',compact('data'));
    }
}
