<?php

namespace App\Http\Controllers\Frontend\Ecom\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //show login form
    public function showLoginForm()
    {
        return view('frontend.ecom.auth.login');
    }

    // login
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
            ],
            [
                'email.required' => 'Please insert your email',
            ]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('profile.index');
        }else{
            return back()->with('error', 'Please Try Again!!!!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
