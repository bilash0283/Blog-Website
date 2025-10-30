<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('fontend.pages.home');
    }
    public function about()
    {
        return view('fontend.pages.about');
    }
}
