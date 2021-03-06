<?php

namespace Service\Interfaces;

use Illuminate\Support\Collection;

interface IRepository
{
    public function where(array $conditions): IRepository;

    public function order(string $orderBy, $orderType): IRepository;

    public function get(): Collection;
}