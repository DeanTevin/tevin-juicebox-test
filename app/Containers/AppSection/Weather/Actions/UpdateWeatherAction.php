<?php

namespace App\Containers\AppSection\Weather\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Weather\Models\Weather;
use App\Containers\AppSection\Weather\Tasks\UpdateWeatherTask;
use App\Containers\AppSection\Weather\UI\API\Requests\UpdateWeatherRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateWeatherAction extends ParentAction
{
    public function __construct(
        private readonly UpdateWeatherTask $updateWeatherTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWeatherRequest $request): Weather
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateWeatherTask->run($data, $request->id);
    }
}
