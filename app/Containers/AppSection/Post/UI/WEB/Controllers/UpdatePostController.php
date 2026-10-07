<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\FindPostByIdAction;
use App\Containers\AppSection\Post\Actions\UpdatePostAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\EditPostRequest;
use App\Containers\AppSection\Post\UI\WEB\Requests\UpdatePostRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdatePostController extends WebController
{
    public function edit(EditPostRequest $request)
    {
        $post = app(FindPostByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdatePostRequest $request)
    {
        $post = app(UpdatePostAction::class)->run($request);
        // ...
    }
}
