<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

abstract class BaseResponse implements ToArrayInterface
{

	use ToArrayTrait;

	/**
	 * @var \Propcom\RestAPI\Infrastructure\Response\Meta
	 */
	protected $meta;

	public function __construct(Meta $meta)
	{
		$this->meta = $meta;
	}

}
