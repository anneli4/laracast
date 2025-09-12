<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::post('/jobs', 'store');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
//     Route::get('/jobs/{job}', 'show');
// });


