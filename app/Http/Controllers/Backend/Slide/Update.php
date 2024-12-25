<?php

namespace App\Http\Controllers\Backend\Slide;

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
            if(\Facades\App\Services\Backend\Slide::update($id,$request)){
                return redirect()->route('admin.slide.update',$id)->with('success','Your Slide updated successfully!');
            } else {
                return redirect()->route('admin.slide.update',$id)->with('danger','Slide has not been updated!');
            }
        }
        $data=[];
        $data['row']=\Facades\App\Services\Backend\Slide::get($id);

        return view('backend.slide.update',compact('data'));
    }
}
