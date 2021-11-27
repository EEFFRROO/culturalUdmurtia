<?php

namespace App\Http\Controllers;

use App\Services\CulturalEventsService;
use App\Enum\Cities;
use Exception;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController
{
    private CulturalEventsService $culturalEventsService;

    public function __construct(CulturalEventsService $culturalEventsService)
    {
        $this->culturalEventsService = $culturalEventsService;
    }

    /**
     * @param int $cityId
     * @param int $pageNumber
     * @return string
     */
    public function showCultural(int $cityId = Cities::IZHEVSK): string
    {
        try {
            $result = $this->culturalEventsService->getEvents($cityId);
        } catch (Exception $exception) {
            $result = ['message' => $exception->getMessage()];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param int $eventId
     * @return string
     */
    public function showEventInfo(int $eventId): string
    {
        try {
            $result = $this->culturalEventsService->getEventInfo($eventId);
        } catch (Exception $exception) {
            $result = ['message' => $exception->getMessage()];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
