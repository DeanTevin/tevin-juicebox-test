<?php

namespace App\Containers\AppSection\Weather\UI\CLI\Commands;

use App\Containers\AppSection\Weather\Jobs\FetchWeatherJob;
use App\Ship\Parents\Commands\ConsoleCommand as ParentConsoleCommand;

class FetchWeatherCommand extends ParentConsoleCommand
{
    protected $signature = 'weather:fetch';

    protected $description = 'Fetch weather data';

    public function handle(): int
    {
        FetchWeatherJob::dispatch();

        $this->info('Weather fetch job dispatched.');

        return self::SUCCESS;
    }

}
