<?php

namespace App\Http\Controllers\Frontend\Ecom\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //show register form
    public function showRegisterForm()
    {
        return view('frontend.ecom.auth.register');
    }

    // register
    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8|confirmed',
            ],
            [
                'name.required' => 'Please insert your name',
                'email.required' => 'Please insert your email',
                'email.unique' => 'Sorry! This email already registed',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return redirect()->route('login')->with('success', 'Registration successfull!! Please Login');
        } else {
            return back()->with('error', 'Please Try again!!!');
        }
    }
}
