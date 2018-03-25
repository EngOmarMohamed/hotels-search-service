<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 05:29 م
 */

namespace Service\Filters;


use Service\Interfaces\IFilter;

class DateRangeFilter implements IFilter
{

    /**
     * Check Availabilty Array of Dates in Range
     *
     * @param $current
     * @param $searched
     * @return bool
     */
    public function filter($current, $searched)
    {
        foreach ($current as $val) {

            $currentFrom = strtotime($val->getFrom());
            $searchedStart = strtotime($searched['start']);

            $currentTo = strtotime($val->getTo());
            $searchedEnd = strtotime($searched['end']);

            if ($currentFrom <= $searchedStart && $currentTo >= $searchedEnd) {
                return true;
            }
        }
        return false;
    }
}