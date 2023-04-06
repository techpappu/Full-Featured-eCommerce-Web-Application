<?php

namespace App\Services\Backend;

use Illuminate\Http\Request;

class Setting
{

    public function update(Request $request)
    {
        $row = \Facades\App\Models\Setting::find($request->id);
       
        $data = $request->only(['title','logo','description','keywords','email','phone','address','city','postcode','status','facebook','twitter','youtube']);
        
        

        if (!empty($row->id)) {
            $row->update($data);
            return true;
        }

        return false;

    }
}