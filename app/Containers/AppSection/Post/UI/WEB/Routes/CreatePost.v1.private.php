<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/create', [CreatePostController::class, 'create'])
    ->middleware(['auth:web']);

