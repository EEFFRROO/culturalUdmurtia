<?php

use Parser\Parser;

class Controller
{
    private const FILMS_URL = 'https://fanlife.ru/afisha/cat/1';
    private const PERFOMANCES_URL = 'https://fanlife.ru/afisha/cat/2';
    private const CONCERTS_URL = 'https://fanlife.ru/afisha/cat/3';
    private const MAIN_URL = 'https://fanlife.ru/afisha';
    private Parser $parser;


    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function loadEvents(): void
    {
        $this->parser->parseSite(self::MAIN_URL);
    }
}