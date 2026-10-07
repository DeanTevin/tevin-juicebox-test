<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::patch('posts/{id}', [UpdatePostController::class, 'update'])
    ->middleware(['auth:web']);

