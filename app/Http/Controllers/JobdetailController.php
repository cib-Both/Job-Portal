<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class JobdetailController extends Controller
{
    public function show($id)
    {
        $post = Post::with(['job.company', 'job.category'])->findOrFail($id);

        // Get the previous URL
        $previousUrl = url()->previous();
        $currentUrl  = url()->current();

        // If user lands directly (no referrer), fallback to job listing
        $defaultUrl = route('jobs');

        // Make sure previous url is not the same as current url
        if ($previousUrl === $currentUrl) {
            $previousUrl = $defaultUrl;
        }

        return view('pages.jobs.detail', compact('post', 'previousUrl'));
    }
}
