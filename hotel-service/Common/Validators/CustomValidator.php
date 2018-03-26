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


        if ($validator->fails() ||
            //validate that min is less than max and otherwise
            (isset($inputs['min']) && $inputs['min'] > $inputs['max']) ||
            (isset($inputs['max']) && $inputs['max'] < $inputs['min'])) {

            $messages = $validator->messages()->getMessages();
            $errorMessages = !empty($messages) ? $messages : ['price_range' => ['max price should be greater than min price and otherwise.']];

            throw new CustomValidationException($errorMessages);
        }
    }


}