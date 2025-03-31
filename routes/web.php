<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Bug;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('students', StudentController::class)->only('index');

Route::resource('students', StudentController::class)->except(['index','destroy'])->middleware(Bug::class);

Route::resource('students', StudentController::class)->only('destroy')->middleware(IsAdmin::class);

Route::resource('lecturers', LecturerController::class);
Route::resource('courses', CourseController::class);


Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');
