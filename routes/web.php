<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('videos',VideoController::class);
Route::resource('Comments',CommentController::class);
Route::resource('posts',PostController::class);

Route::post('/posts/{post}', [CommentController::class, 'storePost'])->name('storePost');

// Route::post('/PostStore/{id}', [CommentController::class,'storePost'])->name('storePost');
Route::post('/videosStore/{id}', [CommentController::class,'storeVideo'])->name('storeVideo');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
//Route::post('/PostStore/{id}', [CommentController::class,'storePost'])->name('storePost');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');