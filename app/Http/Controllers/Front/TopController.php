<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function index()
    {
        return view('front.top.index');
    }
}
