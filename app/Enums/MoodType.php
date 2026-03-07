<?php

namespace App\Enums;

enum MoodType: string
{
    case RAD = 'rad';
    case GOOD = 'good';
    case MEH = 'meh';
    case SAD = 'sad';
    case AWFUL = 'awful';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
