<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frontpage;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function aboutus()
    {
        return view('frontend.aboutus');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
