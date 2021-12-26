<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\tag;


class IndexController extends Controller
{
    public function index(){
        $posts=Post::latest()->get();
        $posts->load('user', 'comments.user', 'likes', 'tags', 'comments.tags',);//｜理解（投稿した人、コメントとコメント書いた人）
        //dd($posts->like_id);
        //dd($posts);
        




        //dd($posts);
        return view('pages.index', compact('posts'));
    } 

}
