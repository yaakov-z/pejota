<?php

namespace App\Helpers;

use App\Enums\CompanySettingsEnum;

class PejotaHelper
{
    /**
     * Format the minutes duration as HH:mm
     *
     * @param int $duration
     * @return string
     */
    public static function formatDuration(?int $duration, bool $formatWithDots = false): string
    {
        if (!$duration) {
            return $formatWithDots ? '00:00' : '00h00';
        }

        return
            str_pad(intdiv($duration, 60), 2, '0', STR_PAD_LEFT)
            . ( $formatWithDots ? ':' : 'h') .
            str_pad($duration % 60, 2, '0', STR_PAD_LEFT);
    }

    public static function getUserTimeZone()
    {
        return auth()->user()->company->settings()->get(CompanySettingsEnum::LOCALIZATION_TIMEZONE->value);
    }
}
