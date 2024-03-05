<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    function index()
     {
        $blogs = Blog::all();
        $categories = Category::all();
        return view('welcome', compact('blogs', 'categories'));
    }

}
