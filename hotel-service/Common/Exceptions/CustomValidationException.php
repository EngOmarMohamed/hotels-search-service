<?php

namespace Service\Common\Exceptions;

class CustomValidationException extends \Exception
{
    /**
     * Array of Errors Messages
     */
    private $errors;


    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Get the Errors Messages
     */
    public function getErrorMessages()
    {
        return ['errors' => $this->errors];
    }
}