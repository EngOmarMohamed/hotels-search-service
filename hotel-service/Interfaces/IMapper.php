<?php

namespace Service\Interfaces;

use Illuminate\Support\Collection;

interface IMapper
{
    public function mapJsonToCollection($input): Collection;
}