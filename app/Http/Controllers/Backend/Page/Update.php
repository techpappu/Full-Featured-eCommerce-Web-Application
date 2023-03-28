<?php

namespace App\Http\Controllers\Backend\Page;

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
            if(\Facades\App\Services\Backend\Page::update($id,$request)){
                return redirect()->route('admin.page.update',$id)->with('success','Your Page updated successfully!');
            } else {
                return redirect()->route('admin.page.update',$id)->with('danger','Page has not been updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Page::get($id);

        return view('backend.page.update',compact('data'));
    }
}
