<?php

namespace spresnac\tacticaltimehelper\Repositories;

use Carbon\Carbon;

class TacticalTimeRepository
{
    public static function toTacticalTime(Carbon $time): string
    {
        return strtolower($time->format('dHiMY'));
    }

    public static function fromTacticalTime(string $tactime): Carbon
    {
        return Carbon::createFromFormat('dHiMY', $tactime)
            ->setSeconds(0);
    }
}
