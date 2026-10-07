<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\FindPostByIdController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{id}', [FindPostByIdController::class, 'show'])
    ->middleware(['auth:web']);

