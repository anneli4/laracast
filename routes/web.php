<?php

use Illuminate\Contracts\Queue\Job as QueueJob;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Js;
use App\Models\job;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    $job = Job::with('employer')->latest()->paginate(3);
return view('jobs.index' , [
        'jobs' =>  $job
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {

    request()->validate([
        'title' => 'required',
        'salary' => 'required|numeric'
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 // Assuming the employer ID is 1 for this example
    ]);

    return redirect('/jobs');
});



Route::get('/contact', function () {
    return view('contact');
});

