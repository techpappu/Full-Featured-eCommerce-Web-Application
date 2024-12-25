<?php 

namespace App\Http\Controllers;

class DemoController extends Controller {

    public function __invoke(){
        $id = 2;
        $role = \Facades\Spatie\Permission\Models\Role::find($id);
        $permission = \Facades\Spatie\Permission\Models\Permission::find($id);
        $role->syncPermissions([$permission->id]);
        dd($role->permissions);
    }

}