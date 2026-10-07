<?php

namespace App\Containers\AppSection\Weather\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Weather\Actions\UpdateWeatherAction;
use App\Containers\AppSection\Weather\UI\API\Requests\UpdateWeatherRequest;
use App\Containers\AppSection\Weather\UI\API\Transformers\WeatherTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function update(UpdateWeatherRequest $request, UpdateWeatherAction $action): array
    {
       $weather = $action->run($request);

       return $this->transform($weather, WeatherTransformer::class);
    }

}
