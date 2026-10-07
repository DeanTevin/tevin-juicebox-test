<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\FindPostByIdAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\FindPostByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindPostByIdController extends WebController
{
    public function show(FindPostByIdRequest $request)
    {
        $post = app(FindPostByIdAction::class)->run($request);
        // ...
    }
}
