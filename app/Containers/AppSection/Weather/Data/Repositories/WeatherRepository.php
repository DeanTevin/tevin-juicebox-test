<?php

namespace App\Containers\AppSection\Weather\Data\Repositories;

use App\Containers\AppSection\Weather\Models\Weather;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Weather
 *
 * @extends ParentRepository<TModel>
 */
class WeatherRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
