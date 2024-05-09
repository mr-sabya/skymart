<?php

namespace App\Http\Controllers\Frontend\Ecom\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        return view('frontend.ecom.auth.profile.index');
    }
}
