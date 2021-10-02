<?php

namespace App\Services;

use App\Dto\EventCardDto;
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
     * @return EventCardDto[]
     */
    public function getEventCards(string $url): array
    {
        $crawler = $this->getContent($url);
        $cards = [];
        $crawler->filter('.entity-cards_item')->each(function (Crawler $item) use (&$cards) {
            $name = $item->filter('.card-heading_title-link')->text();
            $address = $item->filter('.card-heading_place')->text();
            $img = $item->filter('.card-cover_figure')->filter('img')->attr('src');
            $cards[] = new EventCardDto($name, $address, $img);
        });
        return $cards;
    }
}
