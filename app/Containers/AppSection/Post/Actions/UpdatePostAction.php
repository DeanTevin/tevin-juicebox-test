<?php

namespace App\Containers\AppSection\Post\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Post\Models\Post;
use App\Containers\AppSection\Post\Tasks\UpdatePostTask;
use App\Containers\AppSection\Post\UI\API\Requests\UpdatePostRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Actions\Action as ParentAction;
use Exception;
use Throwable;

class UpdatePostAction extends ParentAction
{
    public function __construct(
        private readonly UpdatePostTask $updatePostTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdatePostRequest $request): Post
    {
        try{$data = $request->sanitizeInput([
            'post'
        ]);

        return $this->updatePostTask->run($data, $request->id);
        }catch(Throwable|Exception $e){
            ErrorLogger::alert('Post: Update', 'UpdatePostAction Error', get_class($this), $e);
            throw $e;
        }
    }
}
