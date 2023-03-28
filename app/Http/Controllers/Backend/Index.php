<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            if (\Facades\App\Services\Backend\Index::postLogin($request)) {
                return redirect()->route('adminDashboard')->with('success','Login successfully!');
            } else {
                return redirect()->route('login')->with('danger','Your ID or password is invalid!');
            }
        }

        return view('backend.auth.login');
    }
}
