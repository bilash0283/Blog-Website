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

        $this->validate($request, [
            'post_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        function uploadImage($file,$update = null){
            return $file ? $file->store('/images', ['disk' =>'my_files']) : $update ?? 'images/default.jpg';
        }

        $post = Post::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'post_img' => uploadImage($request->file(key: 'post_img')),
            'category_id' => $request->category_id
        ]);

        flash()->success('Post created successfully!');
        return redirect()->route('post');
    }


}
