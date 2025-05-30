<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

// Các route CRUD cho Category và Course
Route::resource('categories', CategoryController::class);
Route::resource('courses', CourseController::class);
Route::get('courses/{course}/enrollments', [CourseController::class, 'enrollments'])->name('courses.enrollments');

