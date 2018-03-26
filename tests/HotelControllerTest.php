<?php

class HotelControllerTest extends TestCase
{

    function setUp()
    {
        parent::setUp();
        //Call to Custom Loader
        $this->app->singleton('Service\Interfaces\ILoader', 'Tests\Loader\CustomLoader');
    }

    /**
     * Check everything is going well
     */
    public function testService()
    {
        $response = $this->call('GET', '/index');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Search By Name
     */
    public function testSearchByName()
    {
        $response = $this->json('GET', '/index', ['name' => 'golden']);

        $response->seeJsonContains([
            'name' => 'Golden Tulip',
            'city' => 'paris'
        ]);
    }

    /**
     * Search By City
     */
    public function testSearchByCity()
    {
        $response = $this->json('GET', '/index', ['city' => 'dubai']);

        $response->seeJsonContains([
            'name' => 'Media One Hotel',
            'city' => 'dubai',
        ]);
    }

    /**
     * Search By PriceRange
     */
    public function testSearchByPriceRange()
    {
        $response = $this->json('GET', '/index', ['min' => 100, 'max' => 102.5]);
        $response->seeJsonContains([
            'name' => 'Media One Hotel',
            'city' => 'dubai',
            'price' => 102.2,
        ]);
    }

    /**
     * Search By DateRange
     */
    public function testSearchByDateRange()
    {
        $response = $this->json('GET', '/index', [
            'start' => '10-10-2020',
            'end' => '11-10-2020']);

        $response->seeJsonContains([
            'name' => 'Media One Hotel',
            'city' => 'dubai',
            'price' => 102.2,
            'from' => '10-10-2020']);
    }

    public function testSearchMultiConditions()
    {
        $response = $this->json('GET', '/index', [
            'name' => 'hotel',
            'city' => 'dubai',
            'min' => 50,
            'max' => 1000,
            'dateFrom' => '27-10-2020',
            'dateTo' => '10-11-2020']);

        $response->seeJsonContains([
            'name' => 'Media One Hotel',
            'city' => 'dubai',
            'price' => 102.2,
            'from' => '25-10-2020']);
    }

}