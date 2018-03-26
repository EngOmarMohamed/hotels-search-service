<?php

namespace Service\Common\Validators;


use Service\Common\Exceptions\CustomValidationException;
use Service\Interfaces\IValidator;


abstract class CustomValidator implements IValidator
{

    /**
     * Validate the inputs params
     *
     * @param array $inputs
     * @throws CustomValidationException
     */
    public function validate(array $inputs)
    {

        $rules = $this->getRules();
        $inputs = array_map('trim', $inputs);

        $validator = app('validator')->make($inputs, $rules);

        //validate that min is less than max and otherwise

        if ($validator->fails() ||
            (isset($inputs['min']) && $inputs['min'] > $inputs['max']) ||
            (isset($inputs['max']) && $inputs['max'] < $inputs['min'])) {

            throw new CustomValidationException($validator->messages());
        }
    }


}