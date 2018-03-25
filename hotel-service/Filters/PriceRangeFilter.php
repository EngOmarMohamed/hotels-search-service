<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 04:53 م
 */

namespace Service\Filters;


use Service\Interfaces\IFilter;

class PriceRangeFilter implements IFilter
{

    /**
     * Check the Price Attribute in Range
     *
     * @param $current
     * @param $searched
     * @return bool
     */
    public function filter($current, $searched)
    {
        return $current >= $searched['min'] && $current <= $searched['max'];
    }
}