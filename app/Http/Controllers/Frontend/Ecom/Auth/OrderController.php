<?php

namespace App\Http\Controllers\Frontend\Ecom\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        return view('frontend.ecom.auth.order.index');
    }

    //
    public function track()
    {
        return view('frontend.ecom.auth.order.track');
    }
}
