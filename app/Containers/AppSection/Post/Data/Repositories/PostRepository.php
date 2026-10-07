<?php

namespace App\Containers\AppSection\Post\Data\Repositories;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Post
 *
 * @extends ParentRepository<TModel>
 */
class PostRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
    ];
}
