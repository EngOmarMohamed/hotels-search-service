<?php

class HotelControllerTest extends TestCase
{

    function setUp()
    {
        parent::setUp();
        $this->app->singleton('Service\Interfaces\ILoader', 'Tests\Loader\CustomLoader');
    }

    //Check everything is going well
    public function testService()
    {
        $response = $this->call('GET', '/index');
        $this->assertEquals(200, $response->status());
    }



}