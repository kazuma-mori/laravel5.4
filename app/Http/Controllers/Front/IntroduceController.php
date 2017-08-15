<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class IntroduceController extends Controller
{
    public function yosei()
    {
        return view('front.introduce.yosei');
    }

    public function company()
    {
        return view('front.introduce.company');
    }
}
