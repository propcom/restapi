<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

class Meta implements ToArrayInterface
{

	use ToArrayTrait;

	/**
	 * @var string
	 */
	protected $status;

	/**
	 * @var int
	 */
	protected $code;

	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @var string
	 */
	protected $details;

	public function __construct(string $status, int $code, string $message, string $details = '')
	{
		$this->status = $status;
		$this->code = $code;
		$this->message = $message;
		$this->details = $details;
	}

}
