<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')){
            if (\Facades\App\Services\Frontend\Login::login($request)) {
                return redirect()->route('home');
            } else{
                return redirect()->route('frontend.login')->with('danger','Your Email ID OR Password not match!');
            }
        }
        return view('frontend.default.shop.page.login');
    }
}
