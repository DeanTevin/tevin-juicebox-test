<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostController;
use Illuminate\Support\Facades\Route;

Route::post('posts/store', [CreatePostController::class, 'store'])
    ->middleware(['auth:web']);

