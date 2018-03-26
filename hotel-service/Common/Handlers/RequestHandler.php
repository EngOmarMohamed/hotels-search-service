<?php

namespace Service\Common\Handlers;


use Service\Interfaces\IHandler;
use Service\Interfaces\IValidator;

class RequestHandler implements IHandler
{
    private $validator;

    public function __construct(IValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Handle the Request Params - validate and map
     *
     * @param array $params
     * @return mixed
     */
    public function handle(array $params): array
    {

        //Validate the get params
        $this->validator->validate($params);

        return $this->mapInputs($params);
    }


    public function mapInputs(array $params)
    {
        return $params;
    }
}