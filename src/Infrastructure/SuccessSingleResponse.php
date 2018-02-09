<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;

class SuccessSingleResponse extends BaseResponse
{

	/**
	 * @var ToArrayInterface
	 */
	protected $data;

	public function __construct(ToArrayInterface $data, string $message, int $code = 200, string $details = '')
	{
		$this->data = $data;

		$meta = new Meta('success', $code, $message, $details);

		parent::__construct($meta);
	}

}
