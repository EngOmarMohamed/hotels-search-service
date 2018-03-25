<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Service\Interfaces\IRepository;
use Service\Repository\HotelRepository;

class HotelController
{
    private $hotelRepo;


    /**
     * HotelController constructor.
     * @param IRepository $hotelRepository
     */
    public function __construct(IRepository $hotelRepository)
    {
        $this->hotelRepo = $hotelRepository;
    }

    /**
     * entry point for search hotels
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {

//        $hotels = $this->hotelRepo->where(['city' => 'manila', 'availability' => ["start" => "10-10-2020", "end" => "19-10-2020"]])
//            ->order("name", "DESC")
//            ->get();

        $hotels = $this->hotelRepo->where(['city' => 'city1'])
//            ->order("name", "DESC")
            ->get();

        return $hotels;

    }
}