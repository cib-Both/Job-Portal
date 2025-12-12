<?php

use App\Http\Controllers\ProfileController;;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobdetailController;
use App\Http\Controllers\JobsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('/jobs/filter', [JobsController::class, 'filter'])->name('jobs.filter');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/jobs/{id}', [JobdetailController::class, 'show'])->name('jobs.detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-cv', function () {
        return view('pages.my_cv');
    })->name('my.cv');

    Route::post('/cv/upload', [CvController::class, 'store'])->name('cv.store');
    Route::delete('/cv/delete', [CvController::class, 'destroy'])->name('cv.destroy');
    Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');

    Route::post('/jobs/{postId}/apply', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('/jobs/{postId}/check-status', [ApplicationController::class, 'checkStatus'])->name('application.checkStatus');
    Route::delete('/applications/{applicationId}', [ApplicationController::class, 'destroy'])->name('application.destroy');
});

require __DIR__.'/auth.php';
