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

        $request->validate( [
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

    public function editPost($id)
    {
        $posts = Post::find($id);
        $categoryes = Category::where('status','active')->get();
        return view('backend.pages.post.edit',['post' => $posts,'categoris' => $categoryes]);
    }

    public function updatePost(Request $request,$id)
    {
        function uploadImage($file,$update = null){
            return $file ? $file->store('/images', ['disk' =>'my_files']) : $update ?? 'images/default.jpg';
        }

        $post = Post::find($id);
        $post->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'post_img' => uploadImage($request->file(key: 'post_img'),$post->post_img),
            'category_id' => $request->category_id
        ]);

        flash()->success('Post Update Successfull');
        return redirect()->route('post');
        
    }

}
