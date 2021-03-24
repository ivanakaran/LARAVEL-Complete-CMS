<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class WelcomeController extends Controller
{
    public function index()
    {
        // $search = request()->query('search');
        // if ($search) {
        //     $posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(1);
        // } else {
        //     $posts = Post::paginate(2);
        // }

        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::searched()->simplePaginate(3);
        return view('welcome', compact('posts', 'categories', 'tags'));
    }
}