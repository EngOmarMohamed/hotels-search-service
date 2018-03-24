<?php

namespace Service\Mapper;

use Illuminate\Support\Collection;
use Service\Entity\Hotel;
use Service\Entity\Availability;
use Service\Interfaces\IMapper;

class HotelMapper extends Collection implements IMapper
{
    /**
     * map from json string to Collection
     *
     * @param string $json
     * @return Collection
     */
    function mapJsonToCollection(string $json): Collection
    {
        $hotelsArr = json_decode($json, true);

        $hotels = [];
        foreach ($hotelsArr['hotels'] as $hotel) {
            $hotelObj = new Hotel();

            $hotelObj->setName($hotel["name"]);
            $hotelObj->setPrice($hotel["price"]);
            $hotelObj->setCity($hotel["city"]);

            $availabilityDates = $hotel["availability"];

            $availabilities = [];
            foreach ($availabilityDates as $range) {
                $availability = new Availability();

                $availability->setFrom($range["from"]);
                $availability->setTo($range["to"]);

                $availabilities [] = $availability;
            }

            $hotelObj->setAvailability($availabilities);

            array_push($hotels, $hotelObj);
        }

        return collect($hotels);
    }
}