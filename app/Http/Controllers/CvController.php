<?php

namespace App\Http\Controllers;

use App\Models\UserCv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:10240', // 10MB max
        ]);

        $user = Auth::user();
        
        // Delete old CV if exists
        $existingCv = UserCv::where('user_id', $user->id)->first();
        if ($existingCv) {
            Storage::disk('public')->delete($existingCv->resume_path);
            $existingCv->delete();
        }

        // Store the new CV
        $path = $request->file('resume')->store('cvs', 'public');

        // Save to database
        UserCv::create([
            'user_id' => $user->id,
            'resume_path' => $path,
        ]);

        return redirect()->route('dashboard')->with('success', 'CV uploaded successfully!');
    }

    public function destroy()
    {
        $user = Auth::user();
        $userCv = UserCv::where('user_id', $user->id)->first();

        if ($userCv) {
            Storage::disk('public')->delete($userCv->resume_path);
            $userCv->delete();
            return redirect()->route('dashboard')->with('success', 'CV deleted successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'No CV found to delete.');
    }

    public function download()
    {
        $user = Auth::user();
        $userCv = UserCv::where('user_id', $user->id)->first();

        if ($userCv && Storage::disk('public')->exists($userCv->resume_path)) {
            return Storage::disk('public')->download($userCv->resume_path);
        }

        return redirect()->route('dashboard')->with('error', 'CV not found.');
    }
}
