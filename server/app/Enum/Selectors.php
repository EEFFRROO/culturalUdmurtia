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
    /**
     * Класс ссылки на подробности
     */
    public const CARD_LINK = '.card-cover';
    /**
     * Класс тела мероприятия
     */
    public const CONTENT = '.styled-content';
    /**
    /**
     * Класс тела описания мероприятия
     */
    public const CONTENT_BODY = '.styled-content_body';
    /**
     * Класс тела описания мероприятия
     */
    public const ATRIBUTES_OF_EVENT = '.attributes_value';
    /**
     * Класс нижней части мероприятия
     */
    public const BOTTOM_INFO_OF_EVENT = '.card-labels_panel__bottom';
    /**
     * Класс типа мероприятия
     */
    public const TYPE_OF_EVENT = '.attributes_value';
}
