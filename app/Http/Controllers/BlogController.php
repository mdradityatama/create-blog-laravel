<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index()
    {
      // \DB::enableQueryLog();
      $posts = Post::with('author')
                    ->LatestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
      // dd($posts);
      return view("blog.index", compact('posts'));
      // dd(\DB::getQueryLog());
    }

    public function show($id)
    {
      $post = Post::findOrFail($id);
      return view("blog.show", compact('post'));
    }
}
