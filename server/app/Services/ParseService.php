<?php

namespace App\Services;

use App\Dto\EventCardDto;
use App\Enum\Links;
use App\Enum\Selectors;
use Symfony\Component\DomCrawler\Crawler;

class ParseService
{
    private const FIRST_PAGE = 1;
    private const DEFAULT_COUNT_OF_PAGES = 1;

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
        $crawler = $this->getContent($url . self::FIRST_PAGE);
        $countOfPages = $crawler->filter(Selectors::PAGINATION)->last()->text(self::DEFAULT_COUNT_OF_PAGES);
        $cards = [];
        for ($i = 1; $i <= $countOfPages; $i++) {
            $crawler->filter(Selectors::CARD_ITEM)->each(function (Crawler $item) use ($cityName, &$cards) {
                $name = $item->filter(Selectors::CARD_NAME)->text();
                $address = $item->filter(Selectors::CARD_ADDRESS)->text();
                $img = $item->filter('.thumbnail_img')->attr('src');
                $img = preg_replace('/t_average.+.png/', '', $img);
                $link = $item->filter(Selectors::CARD_LINK)->attr('href');
                $type = $item->filter(Selectors::BOTTOM_INFO_OF_EVENT)->children()->children()->first()->text();
                $card = new EventCardDto($name, $cityName, $address, $img, $link);
                $card->setType($type);
                $additionalInfo = $this->getEventFullInfo($link);
                $card->setAttributes($additionalInfo['attributes']);
                $card->setDescription($additionalInfo['description']);
                $cards[] = $card;
            });
            $crawler = $this->getContent($url . ($i + 1));
        }
        return $cards;
    }

    /**
     * @param string $url
     * @return array
     */
    private function getEventFullInfo(string $url): array
    {
        $crawler = $this->getContent(Links::MAIN_SITE . $url);
        $attributes = [];
        $crawler->filter(Selectors::ATRIBUTES_OF_EVENT)->each(function (Crawler $item) use (&$attributes) {
            $attributes[] = $item->text();
        });
        $textBody = $crawler->filter(Selectors::CONTENT)->filter(Selectors::CONTENT_BODY);
        $description = $textBody->text('');
        return [
            'attributes' => implode('   ', $attributes),
            'description' => $description
        ];
    }
}
