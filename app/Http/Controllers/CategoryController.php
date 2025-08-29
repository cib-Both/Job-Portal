<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Get categories with jobs count
        $categories = Category::withCount('jobs')->get();
    }
}
