<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AlreadyTaken implements Rule
{
	private $countValue;
	private $errorMessage;

	/**
	 * Create a new rule instance.
	 *
	 * @return void
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
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		if (is_null($value)) {
			return true;
		}
		else if (is_array($this->countValue)) {
			return !(in_array($value, $this->countValue));
		}

		return ($this->countValue === 0);
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		return trans('validation.unique');
	}
}
