<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/posts');

// Menghasilkan 7 route bernama: posts.index, posts.create, posts.store,
// posts.show, posts.edit, posts.update, posts.destroy
Route::resource('posts', PostController::class);
