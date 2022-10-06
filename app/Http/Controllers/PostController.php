<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){

        //laravel collection (get all posts)
        $posts = Post::paginate(2); 

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request){
        //validation
        $this->validate($request,[
            'body' => 'required'
        ]);

        //create post through user->post()
        $request->user()->posts()->create([
            'body' =>$request->body
        ]);

        return back();
        
    }
}
