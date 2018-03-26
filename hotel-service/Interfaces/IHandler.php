<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 26/03/18
 * Time: 12:05 ص
 */

namespace Service\Interfaces;


interface IHandler
{
    public function handle(array $params);

    public function mapInputs(array $inputs);
}