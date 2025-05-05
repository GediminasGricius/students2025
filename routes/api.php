<?php

use App\Http\Controllers\StudentAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', [StudentAPI::class, "index"]);
Route::get('/students/{id}', [StudentAPI::class, "show"]);
Route::post('/students', [StudentAPI::class, "store"]);
Route::put('/students/{id}', [StudentAPI::class, "update"]);
Route::delete('/students/{id}', [StudentAPI::class, "destroy"]);
