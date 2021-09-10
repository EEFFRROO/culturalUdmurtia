<?php

namespace Parser;

use CurlHandle;
use simple_html_dom;

include_once 'simplehtmldom/simple_html_dom.php';

class Parser
{
    private false|CurlHandle $ch;

    public function __construct($print = false)
    {
        $this->ch = curl_init();
        if (!$print) {
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        }
        curl_setopt($this->ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($this->ch, CURLOPT_ENCODING, '');
    }

    private function set(string $name, string $value): void
    {
        curl_setopt($this->ch, $name, $value);
    }

    private function exec(string $url): string|bool
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        return curl_exec($this->ch);
    }

    public function __destruct() {
        curl_close($this->ch);
    }

    public function parseSite(string $url): string
    {
        $result = $this->exec($url);
//        $dom = new DOMDocument();
//        @$dom->loadHTML($result);
//        var_dump($dom->getElementsByTagName('h1')->item(0)->textContent);
        $dom = new simple_html_dom();
        $dom->load($result);


        foreach ($dom->find('.afisha-card__header') as $item) {
            echo $item;
        }
        return '';
    }
}