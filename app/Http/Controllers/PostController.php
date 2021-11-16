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
   
}

