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
    $job = Job::with('employer')->paginate(3);
return view('jobs' , [
        'jobs' =>  $job
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

