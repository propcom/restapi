<?php

namespace Propcom\RestAPI\Infrastructure;

class SuccessSingleResponse extends BaseResponse
{

	/**
	 * @var array
	 */
	protected $data;

	public function __construct(ToArrayInterface $data, $message, $code = 200, $details = null)
	{
		$this->data = $data;

		$meta = new Meta('success', $code, $message, $details);

		parent::__construct($meta);
	}

}
