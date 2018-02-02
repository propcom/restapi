<?php

namespace Propcom\RestAPI\Infrastructure;

class FailResponse extends BaseResponse
{

	/**
	 * @var array
	 */
	protected $errors = [];

	public function __construct($message, $code = 200, $details = null)
	{
		$meta = new Meta('fail', $code, $message, $details);

		parent::__construct($meta);
	}

	public function addError(ErrorDetails $error)
	{
		array_push($this->errors, $error);
	}

	public function addFieldError(FieldErrorDetails $error)
	{
		array_push($this->errors, $error);
	}

}
