<?php

namespace App\Http\Controllers\Frontend\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        return view('frontend.ecom.shop.index');    
    }
}
