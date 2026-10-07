<?php

namespace App\Containers\AppSection\Weather\Jobs;

use App\Containers\AppSection\Weather\Data\Enums\Geolocation;
use App\Containers\AppSection\Weather\Services\Weather;
use App\Ship\Parents\Jobs\Job as ParentJob;
use DragonCode\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Cache;

 class FetchWeatherJob extends ParentJob
 {
    use Queueable;
    use Dispatchable;
    
    public function handle(): void
    {
        $weather = new Weather();

        $coordinates = Geolocation::Perth->coordinates();

        $cacheKey = 'weather:' . $coordinates['latitude'] . ':' . $coordinates['longitude'];

        $weatherData = $weather->getWeatherData();

         Cache::put(
            $cacheKey,
            $weatherData,
            now()->addMinutes(20),
         );
    }
 }
