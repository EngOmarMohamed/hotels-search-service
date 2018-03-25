<?php

namespace App\Http\Controllers;

use Service\Repository\HotelRepository;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    private $hotelRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepo = $hotelRepository;
    }

    public function index(Request $request)
    {

        $HotelsAsStr = $this->hotelRepo->get()
            ->map(function ($hotel) {
                return $hotel;
            });

        return $HotelsAsStr;

    }
}
