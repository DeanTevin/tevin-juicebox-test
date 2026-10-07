<?php

namespace App\Containers\AppSection\Weather\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Weather\Data\Enums\Geolocation;
use App\Containers\AppSection\Weather\Jobs\FetchWeatherJob;
use App\Containers\AppSection\Weather\UI\API\Requests\UpdateWeatherRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Cache;

class UpdateWeatherAction extends ParentAction
{
    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateWeatherRequest $request)
    {
        $coordinates = Geolocation::Perth->coordinates();
        $cacheKey = 'weather:' . $coordinates['latitude'] . ':' . $coordinates['longitude'];

        $result = Cache::get($cacheKey);

        if (empty($result)){
            FetchWeatherJob::dispatch();
            $result = Cache::get($cacheKey);
        }

        return $result;
        
    }
}
