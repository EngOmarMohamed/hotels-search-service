<?php

namespace Service\Common\Validators;

class HotelCustomValidator extends CustomValidator
{

    public function getRules(): array
    {
        return [
            'name' => 'string',
            'city' => 'string',
            //Price.
            'min' => 'numeric|required_with:max',
            'max' => 'numeric|required_with:min',
            //Date
            'start' => 'date|required_with:end|before:end|date_format:d-m-Y',
            'end' => 'date|required_with:start|after:start|date_format:d-m-Y',
            //Sort
            'orderBy' => 'in:name,price|required_with:orderBy',
            'orderType' => 'in:asc,desc',
        ];
    }
}