<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);

        return view('pages.index')->with(['posts' => $posts]);
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views();

        return view('pages.blog')->with('post', $post);
    }

    public function tagShow(string $slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('status', 1)->paginate(4);
//        dd($posts);
        return view('pages.list')->with('posts', $posts);
    }

    public function categoryShow(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('status', 0)->paginate(4);
//        dd($posts);
        return view('pages.list')->with('posts', $posts);
    }
}
