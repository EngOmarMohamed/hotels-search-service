<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 04:52 م
 */

namespace Service\Filters;


use Service\Interfaces\IFilter;

class ContainFilter implements IFilter
{

    /**
     * Check if Attribute contains keyword
     *
     * @param $current
     * @param $searched
     * @return bool
     */
    public function filter($current, $searched)
    {
        return stripos($current, $searched) !== false;
    }
}