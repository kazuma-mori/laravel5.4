<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class RecruitController extends Controller
{
    public function index()
    {
        return view('front.recruit.index');
    }

    public function contact()
    {
        return view('front.recruit.contact');
    }
}
