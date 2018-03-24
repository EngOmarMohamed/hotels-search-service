<?php

namespace Service\Entity;

class Hotel implements \JsonSerializable
{
    private $name;

    private $price;

    private $city;

    private $availability;

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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return array
     */
    public function getAvailability(): array
    {
        return $this->availability;
    }

    /**
     * @param array $availability
     */
    public function setAvailability($availability): void
    {
        $this->availability = $availability;
    }

    public function __toString()
    {
        $avas = [];
        foreach ($this->availability as $v) {
            $avas [] = $v->__toString();
        }
        $availability = json_encode($avas);
        return "{'name':$this->name ,'price': $this->price , 'city':$this->city , 'availability':$availability}";
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}