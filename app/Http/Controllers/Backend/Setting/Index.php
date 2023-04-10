<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('POST')){
            if (\Facades\App\Services\Backend\Setting::update($request)){
                return redirect()->route('admin.setting')->with('success','Settings has been successfully updated');
            } else{
                return redirect()->route('admin.setting')->with('danger','Settings can not be updated!');
            }
        }

        $data=[];
        $data['row']=\Facades\App\Models\Setting::first();
        $data['file']=$data['row']->getFirstMediaUrl('settings','preview');

        return view('backend.setting.index',compact('data'));
    }
}
