<?php

namespace App\Containers\AppSection\Post\UI\API\Transformers;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class PatchTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Post $post): array
    {
        return [
            'object' => $post->getResourceKey(),
            'id' => $post->getHashedKey(),
            'post_updated' => $post->post,
            'user' => $post->user,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
            'readable_created_at' => $post->created_at->diffForHumans(),
            'readable_updated_at' => $post->updated_at->diffForHumans(),
        ];
    }
}
