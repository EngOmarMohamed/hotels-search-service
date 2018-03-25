<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 25/03/18
 * Time: 04:28 م
 */

namespace Service\Interfaces;


interface IFilter
{
    public function filter($current, $searched);
}