<?php

namespace Service\Repository;

use Service\Filters\ContainFilter;
use Service\Filters\DateRangeFilter;
use Service\Filters\EqualFilter;
use Service\Filters\PriceRangeFilter;

class HotelRepository extends Repository
{

    /**
     * Set the search criteria - search columns and filter type
     *
     * @return array
     */
    protected function getSearchFilters(): array
    {
        return [
            "name" => new ContainFilter(),
            "city" => new EqualFilter(),
            "price" => new PriceRangeFilter(),
            "availability" => new DateRangeFilter()
        ];
    }

}