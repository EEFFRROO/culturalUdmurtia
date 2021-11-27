<?php

namespace App\Dto;

class EventCardDto
{
    /**
     * @var string
     */
    private string $name;
    /**
     * @var string
     */
    private string $address;
    /**
     * @var string
     */
    private string $img;
    /**
     * @var string
     */
    private string $link;

    /**
     * @param string $name
     * @param string $address
     * @param string $img
     * @param string $link
     */
    public function __construct(string $name, string $address, string $img, string $link)
    {
        $this->name = $name;
        $this->address = $address;
        $this->img = $img;
        $this->img = $link;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return [
            $this->name,
            $this->address,
            $this->img,
            $this->link,
        ];
    }
}
