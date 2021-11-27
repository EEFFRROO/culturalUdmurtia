<?php

namespace App\Services;

use App\Enum\Cities;
use App\Enum\Links;

class SelectCityService
{
    public function getCityLink(int $cityId): string
    {
        return match ($cityId) {
            Cities::IZHEVSK => Links::IZHEVSK,
            Cities::GLAZOV => Links::GLAZOV,
            Cities::SARAPUL => Links::SARAPUL,
            Cities::MOZHGA => Links::MOZHGA,
            Cities::VOTKINSK => Links::VOTKINSK,
            default => Links::MAIN_SITE,
        };
    }

    public function getCityName(int $cityId): string
    {
        return match ($cityId) {
            Cities::IZHEVSK => 'IZHEVSK',
            Cities::GLAZOV => 'GLAZOV',
            Cities::SARAPUL => 'SARAPUL',
            Cities::MOZHGA => 'MOZHGA',
            Cities::VOTKINSK => 'VOTKINSK',
            default => 'NONE',
        };
    }
}
