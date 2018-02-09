<?php

namespace Propcom\RestAPI\Application;

use Propcom\RestAPI\Infrastructure\Resultset;

class Collection implements CollectionInterface
{

	use ToArrayTrait {
		toArray as defaultToArray;
	}

	/**
	 * @var \Propcom\RestAPI\Infrastructure\Resultset
	 */
	protected $resultset;

	/**
	 * @var \Propcom\RestAPI\Infrastructure\ToArrayInterface[]
	 */
	protected $data = [];

	public function __construct(Resultset $resultset, array $data = [])
	{
		$this->resultset = $resultset;
		foreach ($data as $datum) {
			$this->addData($datum);
		}
	}

	public function addData(ToArrayInterface $data)
	{
		array_push($this->data, $data);
	}

	public function getData(): array
	{
		return $this->data;
	}

	public function getResultset(): Resultset
	{
		return $this->resultset;
	}

	public function getCount(): int
	{
		return $this->resultset->getCount();
	}

	public function getTotal(): int
	{
		return $this->resultset->getTotal();
	}

	public function getOffset(): int
	{
		return $this->resultset->getOffset();
	}

	public function getLimit(): int
	{
		return $this->resultset->getLimit();
	}

	public function toArray(): array
	{
		$array = $this->defaultToArray();

		unset($array['resultset']);

		return $array;
	}

}
