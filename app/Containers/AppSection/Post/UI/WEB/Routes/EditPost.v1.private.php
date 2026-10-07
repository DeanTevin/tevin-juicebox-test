<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{id}/edit', [UpdatePostController::class, 'edit'])
    ->middleware(['auth:web']);

