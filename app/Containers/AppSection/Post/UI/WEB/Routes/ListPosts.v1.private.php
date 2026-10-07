<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\ListPostsController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [ListPostsController::class, 'index'])
    ->middleware(['auth:web']);

