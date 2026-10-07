<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DeletePostTask extends ParentTask
{
    public function __construct(
        private readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
         try {
            $post = $this->repository->find($id);
            if ($post->user_id != auth()->user()->id){
                throw new HttpException(403,"Unauthorized");
            }
            $result = $this->repository->delete($id);
            PostDeleted::dispatch($result);

            return $result;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        }catch (\Exception $e) {
            ErrorLogger::alert('Post: Delete', 'DeletePostTask Error', get_class($this), $e);
            throw new DeleteResourceFailedException();
        }
    }
}
