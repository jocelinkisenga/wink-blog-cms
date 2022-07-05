<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

class PostController extends Controller
{
    public function index(){
        $posts = WinkPost::with('tags')
                            ->live()
                            ->orderBy('publish_date','DESC')
                            ->simplePaginate(5);

        return view('welcome',['posts'=>$posts]);

    }
}
