<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\DeletePostController;
use Illuminate\Support\Facades\Route;

Route::delete('posts/{id}', [DeletePostController::class, 'destroy'])
    ->middleware(['auth:web']);

