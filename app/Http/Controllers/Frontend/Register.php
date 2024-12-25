<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')){
            if (\Facades\App\Services\Frontend\Register::create($request)) {
                return redirect()->route('frontend.login')->with('success','Registration Completed. Please login!');
            } else{
                return redirect()->route('frontend.register')->with('danger','Registration Failed!');
            }
        }

        return view('frontend.default.shop.page.register');
    }
}
