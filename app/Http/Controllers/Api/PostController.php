<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;
use Wink\WinkAuthor;
use Auth;
use App\Http\Repositories\UserRepositorie;

class PostController extends Controller
{
    public function index(){
        $posts = WinkPost::with('tags')
                            ->live()
                            ->orderBy('publish_date','DESC')
                            ->simplePaginate(5);
     
        $user = UserRepositorie::user_name($posts);
        

        return view('index',['posts'=>$posts, 'user'=>$user]);

    }

    public function show(string $slug){
        $post = WinkPost::where('slug',$slug)->first();

        return view('pages.show',['post'=>$post, 'user'=>$user]);
    }
}
