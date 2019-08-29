<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
    protected $limit = 3;

    public function index()
    {
      // dd($categories);
      // \DB::enableQueryLog();
      $posts = Post::with('author')
                    ->LatestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
      // dd($posts);
      return view("blog.index", compact('posts'));
      // dd(\DB::getQueryLog());
    }

    public function category(Category $category)
    {
      $categoryName = $category->title;

      // dd($categories);
      // \DB::enableQueryLog();
      $posts = $category->posts()
                        ->with('author')
                        ->LatestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
      // dd($posts);
      return view("blog.index", compact('posts', 'categoryName'));
      // dd(\DB::getQueryLog());
    }

    public function show(Post $post)
    {
      return view("blog.show", compact('post'));
    }
}
