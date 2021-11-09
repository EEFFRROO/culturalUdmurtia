<?php

namespace App\Services;

class CulturalEventsService
{
    private SelectCityService $selectCityService;

    public function __construct(SelectCityService $selectCityService)
    {
        $this->selectCityService = $selectCityService;
    }

    /**
     * @param int $cityId
     * @param int $pageNumber
     * @return array
     */
    public function getEvents(int $cityId, int $pageNumber): array
    {
        $parseService = new ParseService();
        $cityLink = $this->selectCityService->getCityLink($cityId) . $pageNumber;
        $eventCards = $parseService->getEventCards($cityLink);
        $result = [];
        $result['pagination'] = $eventCards['pagination'];
        unset($eventCards['pagination']);
        foreach ($eventCards as $eventCard) {
            $result[] = $eventCard->getAll();
        }
        return $result;
    }
}
