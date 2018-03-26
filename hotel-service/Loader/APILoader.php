<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 24/03/18
 * Time: 05:19 م
 */

namespace Service\Loader;


use Service\Interfaces\ILoader;
use GuzzleHttp\Client;

class APILoader implements ILoader
{
    private $apiUrl;

    /**
     * APILoader constructor.
     *
     * @param $apiUrl
     */
    public function __construct()
    {
        $this->apiUrl = config('loader.apiURL');
    }

    /**
     * load data from inventory (apiURL)
     *
     * @return string
     */
    function load(): string
    {

        //old fashion
//        return json_decode(file_get_contents($this->apiUrl), true);

        //new fashion with async request
        $response = (new Client())
            ->requestAsync('GET', $this->apiUrl)
            ->then(function ($res) {
                return $res->getBody()->getContents();
            },
                function ($e) {
                    return $e->getMessage();
                })
            ->wait();

        return $response;
    }

}