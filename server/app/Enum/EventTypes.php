<?php


namespace App\Enum;


class EventTypes
{
    public const VISTAVKI = 'Выставки';
    public const SPEKTAKLI = 'Спектакли';
    public const KONCERTI = 'Концерты';

    public const VISTAVKI_ID = 1;
    public const SPEKTAKLI_ID = 2;
    public const KONCERTI_ID = 3;

    public static function getStringById(int $typeId): string
    {
        return match ($typeId) {
            self::VISTAVKI_ID => self::VISTAVKI,
            self::SPEKTAKLI_ID => self::SPEKTAKLI,
            self::KONCERTI_ID => self::KONCERTI,
            default => self::SPEKTAKLI,
        };
    }
}
