<?php

namespace  App\Containers\AppSection\Weather\Data\Enums;

enum Geolocation: string
{
    case Perth = 'perth';

    public function coordinates(): array
    {
        return match ($this) {
            self::Perth => [
                'latitude' => -31.9558933,
                'longitude' => 115.8605855,
            ],
        };
    }
}