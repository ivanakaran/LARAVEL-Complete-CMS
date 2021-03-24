<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function show(Post $post)
    {

        return view('blog.show', compact('post'));
    }

    public function category(Category $category)
    {

        return view('blog.category')->with('category', $category)->with('posts', $category->posts()->searched()->simplePaginate(3))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag', compact('tag'))->with('posts', $tag->posts()->searched()->simplePaginate(3))->with('categories', Category::all())->with('tags', Tag::all());
    }
}