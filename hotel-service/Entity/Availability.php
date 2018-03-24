<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 24/03/18
 * Time: 06:10 م
 */

namespace Service\Entity;


class Availability implements \JsonSerializable
{

    private $from;

    private $to;

    /**
     * @return int
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    /**
     * @return int
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }


    public function __toString()
    {
        return "{ 'from' : " . date('d-m-Y' , $this->from) . ", 'to':" . date('d-m-Y' , $this->to) . "}";
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