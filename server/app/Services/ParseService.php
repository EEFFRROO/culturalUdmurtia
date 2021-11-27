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
     * @param string $cityName
     * @param string $url
     * @return EventCardDto[]
     */
    public function getEventCardsByCity(string $cityName, string $url): array
    {
        $firstPage = 1;
        $crawler = $this->getContent($url . $firstPage);
        $countOfPages = $crawler->filter(Selectors::PAGINATION)->last()->text(1);
        $cards = [];
        for ($i = 1; $i <= $countOfPages; $i++) {
            $crawler->filter(Selectors::CARD_ITEM)->each(function (Crawler $item) use ($cityName, &$cards) {
                $name = $item->filter(Selectors::CARD_NAME)->text();
                $address = $item->filter(Selectors::CARD_ADDRESS)->text();
                $img = $item->filter(Selectors::CARD_FIGURE)->filter('img')->attr('src');
                $link = $item->filter(Selectors::CARD_LINK)->attr('href');
                $cards[] = new EventCardDto($name, $cityName, $address, $img, $link);
            });
            $crawler = $this->getContent($url . ($i + 1));
        }
        return $cards;
    }
}
