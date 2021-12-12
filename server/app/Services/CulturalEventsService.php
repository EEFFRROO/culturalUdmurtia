<?php

namespace App\Services;

use App\Dto\EventCardDto;
use App\Enum\EventTypes;

class CulturalEventsService
{
    private SelectCityService $selectCityService;
    private DatabaseService $databaseService;
    private ParseService $parseService;

    public function __construct(
        SelectCityService $selectCityService,
        DatabaseService $databaseService,
        ParseService $parseService
    ) {
        $this->selectCityService = $selectCityService;
        $this->databaseService = $databaseService;
        $this->parseService = $parseService;
    }

    /**
     * @param int $cityId
     * @param int $eventTypeId
     * @return array
     */
    public function getEvents(int $cityId, int $eventTypeId): array
    {
        $cityName = $this->selectCityService->getCityName($cityId);
        $eventTypeName = EventTypes::getStringById($eventTypeId);
        $eventCards = $this->databaseService->getEventsByCityAndType($cityName, $eventTypeName);
        $result = [];
        foreach ($eventCards as $eventCard) {
            $result[] = $eventCard->getShortInfo();
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
