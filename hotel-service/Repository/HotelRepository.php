<?php

namespace Service\Repository;

use Service\Mapper\HotelMapper;

class HotelRepository extends APIRepository
{
    /**
     * HotelRepository constructor.
     * pass the Mapper to the parent Repository
     */
    function __construct()
    {
        parent::__construct(new HotelMapper());
    }
}