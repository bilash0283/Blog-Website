<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::get()->where('status','Active');
        return view('fontend.pages.home',['posts' => $posts]);
    }
    public function about()
    {
        return view('fontend.pages.about');
    }
}
