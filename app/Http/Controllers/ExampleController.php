<?php

namespace App\Http\Controllers;

use Service\Interfaces\IRepository;
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

        $HotelsAsStr = $this->hotelRepo->where(['city' => 'manila', 'availability' => ["start" => "10-10-2020", "end" => "19-10-2020"]])
            ->order("name", "DESC")
            ->get();

        return $HotelsAsStr;

    }
}
