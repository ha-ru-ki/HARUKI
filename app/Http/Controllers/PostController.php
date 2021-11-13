<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    public function index(Post $post)

   {
    return view('index')->with(['posts' => $post->getPaginateByLimit(4)]); //view('index')のindexは拡張子 index.blade.phpの
   } 
   
  public function show(Post $post)
   {
       return view('show')->with(['post' => $post]);
   }
   


   
}

