<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\ListPostsAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\ListPostsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListPostsController extends WebController
{
    public function index(ListPostsRequest $request)
    {
        $posts = app(ListPostsAction::class)->run($request);
        // ...
    }
}
