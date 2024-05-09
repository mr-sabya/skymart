<?php

namespace App\Http\Controllers\Frontend\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        return view('frontend.ecom.about.index');    
    }
}
