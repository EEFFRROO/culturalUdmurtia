<?php

namespace App\Http\Controllers;

use App\Services\CulturalEventsService;
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
     * @return string
     */
    public function showCultural(): string
    {
        try {
            $result = $this->culturalEventsService->getEvents();
        } catch (Exception $exception) {
            $result = ['message' => $exception->getMessage()];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
