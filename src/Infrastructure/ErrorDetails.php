<?php

namespace Propcom\RestAPI\Infrastructure;

class ErrorDetails extends ToArray
{

	/**
	 * @var string
	 */
	protected $error_code;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @var string
	 */
	protected $details;

	/**
	 * @var string
	 */
	protected $more_info;

	public function __construct(string $error_code, string $message, string $details = null, string $more_info = null)
	{
		$this->error_code = $error_code;
		$this->message = $message;
		$this->details = $details;
		$this->more_info = $more_info;
	}

}
