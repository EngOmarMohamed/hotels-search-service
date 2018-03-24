<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 01:40 ص
 */

class APILoaderTest extends TestCase
{

    public function testApiLoader()
    {

        $apiLoader = $this->app->make("Service\Loader\APILoader");
        $dataLoaded = $apiLoader->load();

        $data = file_get_contents('https://api.myjson.com/bins/tl0bp');

        self::assertSame($data, $dataLoaded);
    }

}