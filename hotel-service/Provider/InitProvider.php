<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 08:27 م
 */

namespace Service\Provider;


use Illuminate\Support\ServiceProvider;

class InitProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('Service\Interfaces\ILoader', 'Service\Loader\APILoader');
        $this->app->singleton('Service\Interfaces\IMapper', 'Service\Mapper\HotelMapper');

        $this->app->singleton('Service\Interfaces\IRepository', 'Service\Repository\HotelRepository');
        $this->app->singleton('Service\Interfaces\IValidator', 'Service\Common\Validators\HotelCustomValidator');
        $this->app->singleton('Service\Interfaces\IHandler', 'Service\Common\Handlers\HotelRequestHandler');
    }
}