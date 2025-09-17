<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index(Request $request)
    {
        // Base query: only published posts
        $query = Post::with(['job.company'])
            ->where('status', 'published');

        // 🔎 Search
        if ($request->filled('q')) {
            $search = $request->q;
            $query->whereHas('job', function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                   ->orWhereHas('company', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%$search%");
                    });
            });
        }

        // 📂 Category filter
        if ($request->filled('category')) {
            $query->whereHas('job', function ($q) use ($request) {
                $q->where('category_id', $request->category);
            });
        }

        // 📍 Location filter
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        // 💰 Salary filter
        if ($request->salary_option === 'pay') {
            if ($request->filled('min_salary')) {
                $query->where('salary', '>=', $request->min_salary);
            }
            if ($request->filled('max_salary')) {
                $query->where('salary', '<=', $request->max_salary);
            }
        } elseif ($request->salary_option === 'not') {
            $query->whereNull('salary');
        } elseif ($request->salary_option === 'negotiable') {
            $query->where('salary_type', 'negotiable');
        }

        // 🕒 Job Type filter (comes from jobs table!)
        if ($request->filled('type')) {
            $query->whereHas('job', function ($q) use ($request) {
                $q->whereIn('type', $request->input('type'));
            });
        }

        // 🛠 Skills filter (assuming posts table has a JSON or comma string)
        if ($request->filled('skill')) {
            foreach ($request->skills as $skill) {
                $query->where('skill', 'like', "%$skill%");
            }
        }

        // ✅ Get results
        $posts = $query->paginate(9);

        // Data for filters
        $categories = Category::all();
        $locations  = Post::pluck('location')->unique();
        $skills     = Post::pluck('skill')->unique()->filter();
        $jobTypes   = Post::with('job')->get()->pluck('job.type')->unique()->filter();

        // Counts for sidebar
        $jobTypeCounts = [];
        foreach ($jobTypes as $type) {
            $jobTypeCounts[$type] = Post::where('status', 'published')
                ->whereHas('job', function ($q) use ($type) {
                    $q->where('type', $type);
                })
                ->count();
        }

        $skillCounts = [];
        foreach ($skills as $skill) {
            $skillCounts[$skill] = Post::where('status', 'published')
                ->where('skill', 'like', "%$skill%")
                ->count();
        }

        return view('pages.jobs', compact(
            'posts',
            'categories',
            'locations',
            'skills',
            'jobTypes',
            'jobTypeCounts',
            'skillCounts'
        ));
    }
}
