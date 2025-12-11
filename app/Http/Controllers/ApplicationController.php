<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApplicationController extends Controller
{
    public function store(Request $request, $postId)
    {
        try {
            $user = Auth::user();
            
            // Get the post and job
            $post = Post::with('job')->findOrFail($postId);
            
            // Check if job exists
            if (!$post->job) {
                return response()->json([
                    'success' => false,
                    'message' => 'Job not found for this post.'
                ], 404);
            }
            
            $jobId = $post->job->id;
            
            // Check if user has already applied
            $existingApplication = Application::where('user_id', $user->id)
                ->where('job_id', $jobId)
                ->first();
                
            if ($existingApplication) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already applied for this job.'
                ], 400);
            }
            
            // Check if user has uploaded CV
            if (!$user->userCv) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please upload your CV before applying.',
                    'redirect' => route('my.cv')
                ], 400);
            }
            
            // Create application
            Application::create([
                'user_id' => $user->id,
                'job_id' => $jobId,
                'status' => 'applied',
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Application submitted successfully!'
            ]);
            
        } catch (\Exception $e) {
            Log::error('Application submission error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your application. Please try again.'
            ], 500);
        }
    }
    
    public function checkStatus($postId)
    {
        try {
            $user = Auth::user();
            $post = Post::with('job')->findOrFail($postId);
            
            // Check if job exists
            if (!$post->job) {
                return response()->json([
                    'hasApplied' => false,
                    'hasCv' => $user->userCv !== null
                ]);
            }
            
            $application = Application::where('user_id', $user->id)
                ->where('job_id', $post->job->id)
                ->first();
                
            return response()->json([
                'hasApplied' => $application !== null,
                'hasCv' => $user->userCv !== null
            ]);
            
        } catch (\Exception $e) {
            Log::error('Check application status error: ' . $e->getMessage());
            
            return response()->json([
                'hasApplied' => false,
                'hasCv' => false
            ]);
        }
    }
}