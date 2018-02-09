<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

class FailDetails implements ToArrayInterface
{

	use ToArrayTrait;

	/**
	 * @var string
	 */
	protected $field;

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

	public function __construct(string $field, string $message, string $details = null, string $more_info = null)
	{
		$this->field = $field;
		$this->message = $message;
		$this->details = $details;
		$this->more_info = $more_info;
	}

}
