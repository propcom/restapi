<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArray;

class Meta extends ToArray
{

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
