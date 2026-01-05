<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        // Get filter parameters
        $status = $request->get('status');
        $search = $request->get('search');
        
        // Build query
        $query = Application::with(['job.company', 'job.category'])
            ->where('user_id', $user->id);
        
        // Apply status filter
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }
        
        // Apply search filter
        if ($search) {
            $query->whereHas('job', function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhereHas('company', function($q2) use ($search) {
                      $q2->where('name', 'like', '%' . $search . '%');
                  });
            });
        }
        
        // Get applications with pagination
        $applications = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get statistics
        $stats = [
            'total' => Application::where('user_id', $user->id)->count(),
            'applied' => Application::where('user_id', $user->id)->where('status', 'applied')->count(),
            'interviewed' => Application::where('user_id', $user->id)->where('status', 'interviewed')->count(),
            'offered' => Application::where('user_id', $user->id)->where('status', 'offered')->count(),
            'rejected' => Application::where('user_id', $user->id)->where('status', 'rejected')->count(),
        ];
        
        return view('pages.dashboard', compact('applications', 'stats', 'status', 'search'));
    }
}