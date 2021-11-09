<?php

namespace App\Enum;

class Selectors
{
    /**
     * Класс карточки
     */
    public const CARD_ITEM = '.entity-cards_item';
    /**
     * Класс заголовка карточки
     */
    public const CARD_NAME = '.card-heading_title-link';
    /**
     * Класс адресса карточки
     */
    public const CARD_ADDRESS = '.card-heading_place';
    /**
     * Класс фигуры карточки(для изображения)
     */
    public const CARD_FIGURE = '.card-cover_figure';
    /**
     * Класс пагинации
     */
    public const PAGINATION = '.pagination_item';
}
