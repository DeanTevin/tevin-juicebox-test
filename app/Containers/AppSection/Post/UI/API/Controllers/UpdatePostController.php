<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\UpdatePostAction;
use App\Containers\AppSection\Post\UI\API\Requests\UpdatePostRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PatchTransformer;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdatePostController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdatePostRequest $request, UpdatePostAction $action): array
    {
        $post = $action->run($request);

        return $this->transform($post, PatchTransformer::class);
    }
}
