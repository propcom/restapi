<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

class Meta implements ToArrayInterface
{

	use ToArrayTrait;

	protected $status;

	protected $code;

	protected $message;

	protected $details;

	protected $resultset;

	public function __construct(string $status, int $code, string $message, string $details = null)
	{
		$this->status = $status;
		$this->code = $code;
		$this->message = $message;
		$this->details = $details;
	}

	public function setResultset(Resultset $resultset)
	{
		$this->resultset = $resultset;
	}

}
