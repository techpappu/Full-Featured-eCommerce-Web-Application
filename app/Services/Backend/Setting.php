<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Setting
{

    public function update(Request $request)
    {
        $row = \Facades\App\Models\Setting::find($request->id);
       
        $data = $request->only(['title','currency_prefix','description','keywords','email','phone','address','city','postcode','status','facebook','twitter','youtube']);
    
        $file=$row->getFirstMedia('settings');

        if(!empty($request->file)){
            if(!empty($file->id)){
                $row->getFirstMedia('settings')->delete();
            }
            $row->addMedia($request->file)->toMediaCollection('settings');
        }

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
}