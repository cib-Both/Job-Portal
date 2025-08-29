<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::with(['job.company', 'job.category'])->findOrFail($id);
        return view('pages.jobs.detail', compact('post'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::whereHas('job', function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%');
        })->with(['job.company'])->where('status', 'published')->latest()->paginate(10);

        $categories = Category::withCount('jobs')->get();

        return view('pages.jobs', compact('posts', 'categories', 'query'));
    }
}
