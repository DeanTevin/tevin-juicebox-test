<?php

namespace App\Containers\AppSection\Weather\Data\Factories;

use App\Containers\AppSection\Weather\Models\Weather;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Weather
 *
 * @extends ParentFactory<TModel>
 */
class WeatherFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Weather::class;

    public function definition(): array
    {
        return [];
    }
}
