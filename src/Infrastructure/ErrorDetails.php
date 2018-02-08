<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

class ErrorDetails implements ToArrayInterface
{

	use ToArrayTrait;

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
