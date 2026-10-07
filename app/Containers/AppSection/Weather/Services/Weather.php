<?php

namespace App\Containers\AppSection\Weather\Services;

use App\Containers\AppSection\Weather\Data\Enums\Geolocation;
use App\Helpers\ResponseHelper;
use App\Ship\Enums\LogLevelEnums;
use App\Ship\Monitoring\ActivityLog\Helpers\ErrorLogger;
use App\Ship\Monitoring\ActivityLog\Helpers\GeneralLogger;
use Exception as GlobalException;
use FFI\Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Contracts\Activity;

/**
 * Weather class is used for accessing Open Weather Map API
 * 
 * 
 */
class Weather
{
    private static $OpenWeatherToken;

    private static $OpenWeatherUrl;

    public function __construct()
    {
        //Populate variables from the config file
        Weather::$OpenWeatherToken = config('appSection-weather.token');
        Weather::$OpenWeatherUrl = config('appSection-weather.url');
    }

    /**
     * Service API URL, depends on $isProduction
     * @return string 
     */
    private static function getUrl()
    {
        return Weather::$OpenWeatherUrl;
    }

    /**
     * Service API URL, depends on $isProduction
     * @return string 
     */
    private static function getToken()
    {
        return Weather::$OpenWeatherToken;
    }

    /**
     * Service API URL, depends on $isProduction
     * @return string 
     */
    public static function getWeatherData()
    {
        $geolocation = Geolocation::Perth->coordinates();
        $result = Http::get(Weather::getUrl().'data/2.5/weather',
        [
            'lat' => $geolocation['latitude'],
            'lon' => $geolocation['longitude'],
            'appid' => Weather::getToken()
        ]);
        
        
        return $result->getBody()->getContents();
    }

}