<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\ListPostsAction;
use App\Containers\AppSection\Post\UI\API\Requests\ListPostsRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Controllers\ApiController;
use Exception;
use Prettus\Repository\Exceptions\RepositoryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ListPostsController extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListPostsRequest $request, ListPostsAction $action): array
    {
        try{
            $posts = $action->run($request);

        return $this->transform($posts, PostTransformer::class);
        }
        catch(Throwable $e){
            ErrorLogger::alert('Post:All', 'GetAllPostTask Error', get_class($this), $e);
            throw $e;
        }
    }
}
