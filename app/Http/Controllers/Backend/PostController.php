<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post()
    {
        $posts = Post::with('category')->get();
        return view('backend.pages.post.index',['posts' => $posts]);
    }

    public function add_post()
    {
        $category = Category::where('status','active')->get();
        return view('backend.pages.post.add',['categoris' => $category]);
    }

    public function store_post(Request $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'post_img' => $request->file('post_img')->storePublicly('post_img'),
            'category_id' => $request->category_id
        ]);

        flash()->success('Post created successfully!');
        return redirect()->route('post');
    }


}
