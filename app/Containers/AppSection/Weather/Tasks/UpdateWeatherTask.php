<?php

namespace App\Containers\AppSection\Weather\Tasks;

use App\Containers\AppSection\Weather\Data\Repositories\WeatherRepository;
use App\Containers\AppSection\Weather\Models\Weather;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateWeatherTask extends ParentTask
{
    public function __construct(
        private readonly WeatherRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Weather
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
