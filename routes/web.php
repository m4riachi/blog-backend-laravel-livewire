<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/categories', function () {
        return view('categories');
    })->name('categories');

    Route::get('/posts', function () {
        return view('posts');
    })->name('posts');

    Route::get('/preview/{post}', function (Illuminate\Http\Request $request, App\Models\Post $post) {
        return view('preview', [
            'post' => $post
        ]);
    })->name('preview');
});
