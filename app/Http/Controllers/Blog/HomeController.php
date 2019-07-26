<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome')
            ->with('posts', Post::latest()->simplepaginate(2))
            ->with('categories', Category::all());
    }
}
