<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\FindPostByIdAction;
use App\Containers\AppSection\Post\UI\API\Requests\FindPostByIdRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindPostByIdController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function __invoke(FindPostByIdRequest $request, FindPostByIdAction $action): array
    {
        $post = $action->run($request);

        return $this->transform($post, PostTransformer::class);
    }
}
