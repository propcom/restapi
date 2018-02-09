<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Application;

class BasicCollection implements CollectionInterface
{

	use ToArrayTrait;

	/**
	 * @var \Propcom\RestAPI\Application\ToArrayInterface[]
	 */
	protected $data = [];

	public function __construct(array $data = [])
	{
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

	public function getCount(): int
	{
		return count($this->data);
	}

	public function getTotal(): int
	{
		return $this->getCount();
	}

	public function getOffset(): int
	{
		return 0;
	}

	public function getLimit(): int
	{
		return $this->getCount();
	}
}
