<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// Jobs Index Route
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

// Create Job Route
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Edit Job Route
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.edit', ['job' => $job]);
});

// Store Job Route
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'string', 'max:255'],
        'salary' => ['required', 'string', 'max:50'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 // Adjust as needed
    ]);

    return redirect('/jobs');
});

// Update Job Route
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'string', 'max:255'],
        'salary' => ['required', 'string', 'max:50'],
    ]);

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect("/jobs/{$id}");
});

// Delete Job Route
Route::delete('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');
});

// Show Job Route (placed last to avoid conflict with /jobs/create etc.)
Route::get('/jobs/{id}', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.show', ['job' => $job]);
});

// Contact Route
Route::get('/contact', function () {
    return view('contact');
});
