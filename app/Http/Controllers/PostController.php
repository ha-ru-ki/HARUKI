<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest; // useする
use App\Post;


class PostController extends Controller
{
    public function index(Post $post)

   {
    return view('index')->with(['posts' => $post->getPaginateByLimit(4)]); 
   } 
   
    public function show(Post $post)
   {
       return view('show')->with(['post' => $post]);
   }
   
    public function create()
    {
        return view('create');
    }  

    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
   
   public function edit(Post $post)
   {
    return view('edit')->with(['post' => $post]);
   }
   
   public function update(PostRequest $request, Post $post)
   {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
   }
   
   public function delete(Post $post)
{
    $post->delete();
    return redirect('/');
}
}

