<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('jobs.index'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('jobs', JobController::class)
        ->only(['index', 'show'])
        ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('jobs.applications', JobApplicationController::class)->only(['create', 'store']);
    Route::resource('my-job-applications', \App\Http\Controllers\MyJobApplicationsController::class)
        ->only(['index', 'destroy']);
    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);
    Route::resource('my-jobs', MyJobController::class)->only('index','create','store','edit', 'update','destroy')->middleware(['employer']);

});

require __DIR__.'/auth.php';
