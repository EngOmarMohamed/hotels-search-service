<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 04:52 م
 */

namespace Service\Filters;


use Service\Interfaces\IFilter;

class EqualFilter implements IFilter
{

    /**
     * Check the equality between two strings
     *
     * @param $current
     * @param $searched
     * @return bool
     */
    public function filter($current, $searched)
    {
        return strcasecmp($current, $searched) == 0;
    }
}