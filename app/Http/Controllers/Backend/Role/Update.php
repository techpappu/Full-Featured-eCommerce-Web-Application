<?php

namespace App\Http\Controllers\Backend\Role;

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
            if(\Facades\App\Services\Backend\Role::update($id,$request)){
                return redirect()->route('admin.role.update',$id)->with('success','Role has been successfully updated');
            } else{
                return redirect()->route('admin.role.update',$id)->with('danger','Role can not be updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Role::get($id);
        return view('backend.role.update',compact('data'));
    }
}
