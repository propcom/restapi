<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Infrastructure;

class CollectionMeta extends Meta
{

	/**
	 * @var \Propcom\RestAPI\Infrastructure\Resultset
	 */
	protected $resultset;

	public function setResultset(Resultset $resultset)
	{
		$this->resultset = $resultset;
	}

}
