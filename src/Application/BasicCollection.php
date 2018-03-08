<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Application;

class BasicCollection implements CollectionInterface
{

	use ToArrayTrait;

	/**
	 * @var \Propcom\RestAPI\Application\ToArrayInterface[]
	 */
	protected $items = [];

	public function __construct(array $items = [])
	{
		foreach ($items as $item) {
			$this->addItem($item);
		}
	}

	public function addItem(ToArrayInterface $item)
	{
		array_push($this->items, $item);
	}

	public function getItems(): array
	{
		return $this->items;
	}

	public function getCount(): int
	{
		return count($this->items);
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
