<?php

namespace Tests;


use Service\Entity\Availability;
use Service\Filters\ContainFilter;
use Service\Filters\DateRangeFilter;
use Service\Filters\EqualFilter;
use Service\Filters\PriceRangeFilter;

class FiltersTest extends \TestCase
{
    //Test EqualFilter check if two strings are equal
    public function testEqualFilter()
    {
        $equalFilter = new EqualFilter();
        $result = $equalFilter->filter("CityName", "CityName");

        self::assertEquals(true, $result);
    }

    //Test EqualFilter Case insensitive
    public function testIEqualFilter()
    {
        $equalFilter = new EqualFilter();
        $result = $equalFilter->filter("CityName", "cityname");

        self::assertEquals(true, $result);
    }

    //Test ConatinFilter check if string has a keyword
    public function testContainFilter()
    {
        $containFilter = new ContainFilter();
        $result = $containFilter->filter("golden hotel", "golden");

        self::assertEquals(true, $result);
    }

    //Test ConatinFilter Case insensitive
    public function testIContainFilter()
    {
        $containFilter = new ContainFilter();
        $result = $containFilter->filter("Golden Hotel", "golden");

        self::assertEquals(true, $result);
    }

    //Test PriceRangeFilter check if price is in specified range
    public function testPriceRangeFilter()
    {
        $priceFilter = new PriceRangeFilter();
        $result = $priceFilter->filter(100, ['min' => 50, 'max' => 200]);

        self::assertEquals(true, $result);
    }

    //Test DateRangeFilter check the Hotel Availability Dates
    public function testDateRangeFilter()
    {
        $dateFilter = new DateRangeFilter();

        $availability = new Availability();
        $availability->setFrom("10-10-2020");
        $availability->setTo("15-10-2020");

        $result = $dateFilter->filter([$availability], ['start' => "11-10-2020", 'end' => "14-10-2020"]);

        self::assertEquals(true, $result);
    }
}