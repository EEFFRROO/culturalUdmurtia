<?php

namespace App\Console\Commands;

use App\Enum\Cities;
use App\Services\DatabaseService;
use App\Services\ParseService;
use App\Services\SelectCityService;
use Illuminate\Console\Command;

class ParseEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse events';
    private ParseService $parseService;
    private SelectCityService $selectCityService;
    private DatabaseService $databaseService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        ParseService $parseService,
        SelectCityService $selectCityService,
        DatabaseService $databaseService
    ) {
        $this->parseService = $parseService;
        $this->selectCityService = $selectCityService;
        $this->databaseService = $databaseService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        for ($i = 1; $i <= Cities::CITIES_COUNT; $i++) {
            $cityName = $this->selectCityService->getCityName($i);
            $cityUrl = $this->selectCityService->getCityLink($i);
            $cards = $this->parseService->getEventCardsByCity($cityName, $cityUrl);
            $this->databaseService->insertEventCards($cards);
        }
    }
}
