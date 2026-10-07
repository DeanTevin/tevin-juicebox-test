<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Events\PostUpdated;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UpdatePostTask extends ParentTask
{
    public function __construct(
        private readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Post
    {
        try {
            $post = $this->repository->find($id);
            if ($post->user_id != auth()->user()->id){
                throw new HttpException(403,"Unauthorized");
            }
            $post = $this->repository->update($data, $id);
            PostUpdated::dispatch($post);

            return $post;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        }catch (\Exception $e) {
            ErrorLogger::alert('Post: Update', 'UpdatePostTask Error', get_class($this), $e);
            throw new UpdateResourceFailedException();
        }
    }
}
