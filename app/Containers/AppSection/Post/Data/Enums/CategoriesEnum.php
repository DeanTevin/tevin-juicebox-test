<?php

namespace App\Containers\AppSection\Post\Data\Enums;

enum CategoriesEnum: string
{
    case News = '1';
    case General = '2';
    case Announcement = '3';
    
    public function label(): string
    {
        return match ($this) {
            self::News => 'News',
            self::General => 'General',
            self::Announcement => 'Announcement',
        };
    }
}