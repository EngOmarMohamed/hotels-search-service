<?php

namespace Service\Repository;

use Service\Common\APIRepository;
use Service\Filters\ContainFilter;
use Service\Filters\DateRangeFilter;
use Service\Filters\EqualFilter;
use Service\Filters\PriceRangeFilter;
use Service\Mapper\HotelMapper;

class HotelRepository extends APIRepository
{

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