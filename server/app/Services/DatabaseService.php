<?php

namespace App\Services;

use App\Dto\EventCardDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DatabaseService
{
    /**
     * @param EventCardDto[] $cards
     */
    public function insertEventCards(array $cards): void
    {
        foreach ($cards as $card) {
            DB::insert('insert ignore into event_cards (name, city, address, img, link) values (?, ?, ?, ?, ?)', [
                $card->getName(),
                $card->getCity(),
                $card->getAddress(),
                $card->getImg(),
                $card->getLink()
            ]);
        }
    }

    /**
     * @param string $cityName
     * @return EventCardDto[]
     */
    public function getEventsByCity(string $cityName): array
    {
        $cards = DB::table('event_cards')->where('city', $cityName)->get()->all();
        $result = [];
        foreach ($cards as $card) {
            $tempCard = new EventCardDto(
                $card['name'],
                $card['city'],
                $card['address'],
                $card['img'],
                $card['link'],
            );
            $tempCard->setId($card['id']);
            $result[] = $tempCard;
        }
        return $result;
    }

    /**
     * @param int $eventId
     * @return EventCardDto|null
     */
    public function getEventInfo(int $eventId): ?EventCardDto
    {
        $tempCard = null;
        if ($card = DB::table('event_cards')->where('id', $eventId)->get()->toArray()) {
            $card = current(json_decode(json_encode($card), true));
            $tempCard = new EventCardDto(
                $card['name'],
                $card['city'],
                $card['address'],
                $card['img'],
                $card['link'],
            );
            $tempCard->setId($card['id']);
        }
        return $tempCard;
    }
}
