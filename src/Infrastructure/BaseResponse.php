<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArray;

abstract class BaseResponse extends ToArray
{

	/**
	 * @var \Propcom\RestAPI\Infrastructure\Response\Meta
	 */
	protected $meta;

	public function __construct(Meta $meta)
	{
		$this->meta = $meta;
	}

}
