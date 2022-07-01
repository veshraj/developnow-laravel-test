<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NonExistingRule implements Rule
{
    private $countValue;
    private $errorMessage;

    /**
     * Create a new rule instance.
     *
     * @param $countValue
     * @param null $errorMessage
     */
    public function __construct($countValue, $errorMessage = null)
    {
        $this->countValue   = $countValue;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {

        if (is_null($value) || empty($value)) {
            return true;
        } else {
            if (is_array($this->countValue)) {
                return (in_array($value, $this->countValue));
            }
        }

        return !!$this->countValue;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (!!$this->errorMessage) {
            return $this->errorMessage;
        }

        return trans('validation.exists');
    }
}
