<?php

class HotelMapperTest extends TestCase
{

    private $data;

    function setUp()
    {
        parent::setUp();
        //Call to Custom Loader
        $this->app->singleton('Service\Interfaces\ILoader', 'Tests\Loader\CustomLoader');
        $this->data = $this->app->make('Service\Interfaces\ILoader')->load();
    }

    /**
     * Check the count of the Loaded data from Custom Loader by
     */
    function testHotelMapper()
    {
        $hotelMapper = $this->app->make("Service\Mapper\HotelMapper");
        $hotelObjsCollection = $hotelMapper->mapJsonToCollection($this->data);

        self::assertEquals(6, $hotelObjsCollection->count());
    }
}