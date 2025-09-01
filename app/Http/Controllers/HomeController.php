<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 public function index()
    {
        $categories = Category::withCount('jobs')->get();
        $posts = Post::with(['job.company'])
            ->where('status', 'published')
            ->latest()
            ->take(4)
            ->get();

        return view('pages.home', compact('categories', 'posts'));
    }
}

