<?php

namespace App\Containers\AppSection\Weather\UI\API\Transformers;

use App\Containers\AppSection\Weather\Models\Weather;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class WeatherTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Weather $weather): array
    {
        return [
            'object' => $weather->getResourceKey(),
            'id' => $weather->getHashedKey(),
            'created_at' => $weather->created_at,
            'updated_at' => $weather->updated_at,
            'readable_created_at' => $weather->created_at->diffForHumans(),
            'readable_updated_at' => $weather->updated_at->diffForHumans(),
        ];
    }
}
