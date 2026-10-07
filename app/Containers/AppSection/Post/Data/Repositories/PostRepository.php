<?php

namespace App\Containers\AppSection\Post\Data\Repositories;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Repositories\Repository as ParentRepository;
use Override;

/**
 * @template TModel of Post
 *
 * @extends ParentRepository<TModel>
 */
class PostRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'user.name' => 'like',
        'created_at' => 'like',
    ];
}
