<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Service\Interfaces\IHandler;
use Service\Interfaces\IRepository;
use Service\Repository\HotelRepository;

class HotelController
{

    private $hotelRepo;

    private $hotelHandler;


    /**
     * HotelController constructor.
     *
     * @param IRepository $hotelRepository
     */
    public function __construct(IRepository $hotelRepository, IHandler $hotelHandler)
    {
        $this->hotelRepo = $hotelRepository;
        $this->hotelHandler = $hotelHandler;
    }

    /**
     * entry point for search hotels
     *
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $request)
    {

        $inputs = $request->only(['name', 'city', 'min', 'max', 'start', 'end', 'orderBy', 'orderType']);
        $conditions = $this->hotelHandler->handle($inputs);

        if (!empty($conditions['filters'])) {
            $this->hotelRepo->where($conditions['filters']);
        }

        if (!empty($conditions['sort'])) {
            $orderType = $conditions['sort']['orderType'] ?? "";
            $orderBy = $conditions['sort']['orderBy'];
            $this->hotelRepo->order($orderBy, $orderType);
        }

        $hotels = $this->hotelRepo->get();

        return $hotels;

    }
}