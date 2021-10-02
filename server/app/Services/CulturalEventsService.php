<?php

namespace App\Services;

class CulturalEventsService
{
    /**
     * @return array
     */
    public function getEvents(): array
    {
        $parseService = new ParseService();
        $eventCards = $parseService->getEventCards('https://www.culture.ru/afisha/izhevsk');
        $result = [];
        foreach ($eventCards as $eventCard) {
            $result[] = $eventCard->getAll();
        }
        return $result;
    }
}
