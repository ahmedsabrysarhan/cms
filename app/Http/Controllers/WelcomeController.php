<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Welcome Page 
    public function index(){
        return view('welcome' , [
            'posts' => Post::all(),
            'categories' => Category::all(),
        ]);
    }


    public function postShow(Post $post){
        return view('front.post', ['post' => $post]);
    }
}
