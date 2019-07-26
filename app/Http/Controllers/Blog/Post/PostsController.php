<?php

namespace App\Http\Controllers\Blog\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')
            ->with('post', $post)
            ->with('categories', Category::all());
    }
}
