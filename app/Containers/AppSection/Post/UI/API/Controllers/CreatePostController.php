<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\CreatePostAction;
use App\Containers\AppSection\Post\UI\API\Requests\CreatePostRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreatePostController extends ApiController
{
    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreatePostRequest $request, CreatePostAction $action): JsonResponse
    {
        $post = $action->run($request);

        return $this->created($this->transform($post, PostTransformer::class));
    }
}
