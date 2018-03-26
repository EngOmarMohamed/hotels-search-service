<?php

namespace Service\Interfaces;


interface IValidator
{
    public function getRules(): array;

    public function validate(array $inputs);
}