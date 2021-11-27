<?php

namespace App\Services;

use App\Dto\EventCardDto;

class CulturalEventsService
{
    private SelectCityService $selectCityService;
    private DatabaseService $databaseService;

    public function __construct(SelectCityService $selectCityService, DatabaseService $databaseService)
    {
        $this->selectCityService = $selectCityService;
        $this->databaseService = $databaseService;
    }

    /**
     * @param int $cityId
     * @return array
     */
    public function getEvents(int $cityId): array
    {
        $cityName = $this->selectCityService->getCityName($cityId);
        $eventCards = $this->databaseService->getEventsByCity($cityName);
        $result = [];
        foreach ($eventCards as $eventCard) {
            $result[] = $eventCard->getAll();
        }
        return $result;
    }

    /**
     * @param int $eventId
     * @return array|null
     */
    public function getEventInfo(int $eventId): ?array
    {
        return $this->databaseService->getEventInfo($eventId)->getAll();
    }
}
