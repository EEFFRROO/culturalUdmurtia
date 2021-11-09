<?php

namespace App\Services;

use App\Dto\EventCardDto;
use App\Enum\Selectors;
use Symfony\Component\DomCrawler\Crawler;

class ParseService
{
    /**
     * @param string $url
     * @return Crawler
     */
    private function getContent(string $url): Crawler
    {
        $html = file_get_contents($url);
        return new Crawler($html);
    }

    /**
     * @param string $url
     * @return EventCardDto[]
     */
    public function getEventCards(string $url): array
    {
        $crawler = $this->getContent($url);
        $cards = [];
        $crawler->filter(Selectors::CARD_ITEM)->each(function (Crawler $item) use (&$cards) {
            $name = $item->filter(Selectors::CARD_NAME)->text();
            $address = $item->filter(Selectors::CARD_ADDRESS)->text();
            $img = $item->filter(Selectors::CARD_FIGURE)->filter('img')->attr('src');
            $cards[] = new EventCardDto($name, $address, $img);
        });
        $cards['pagination'] = $crawler->filter(Selectors::PAGINATION)->last()->text();
        return $cards;
    }
}
