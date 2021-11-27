<?php

namespace App\Services;

use App\Dto\EventCardDto;
use Illuminate\Support\Facades\DB;

class DatabaseService
{
    /**
     * @param EventCardDto[] $cards
     */
    public function insertEventCards(array $cards): void
    {
        foreach ($cards as $card) {
            DB::insert('insert ignore into event_cards (name, address, img, link) values (?, ?, ?, ?)', [
                $card->getName(),
                $card->getAddress(),
                $card->getImg(),
                $card->getLink()
            ]);
        }
    }
}
