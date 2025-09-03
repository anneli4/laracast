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
return view('jobs' , [
        'jobs' =>  job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

